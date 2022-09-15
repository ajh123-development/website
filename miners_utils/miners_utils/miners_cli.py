#!python

import configparser
config: configparser.ConfigParser = None

def print_config(config, start_key=None):
    from configparser import SectionProxy
    if start_key is not None:
        print("["+start_key+"]")
    for key in config:
        iterable = False
        if isinstance(config[key], SectionProxy):
            iterable = True
        if iterable:
            print_config(config[key], key)
        else:
            print("  "+key+" = "+config[key])

def load_config(conf_path):
    global config
    import pathlib
    cwd = pathlib.Path.cwd()
    if conf_path is None:
        conf_path = str(pathlib.Path.joinpath(cwd, "miners.ini"))
        dir = str(pathlib.Path.joinpath(cwd, "site"))

        config = configparser.ConfigParser()
        config.add_section("build")
        config.set("build", "dir", dir)

        config.add_section('deploy')
        config.set("deploy", "publish_dir", "")

        config.add_section('database/news')
        config.set("database/news", "DB_HOST", "localhost")
        config.set("database/news", "DB_TABLE", "cms")
        config.set("database/news", "DB_USERNAME", "root")
        config.set("database/news", "DB_PASSWORD", "")

        return conf_path

if __name__ == "__main__":
    import argparse, os
    parser = argparse.ArgumentParser("miners_cli")
    parser.add_argument("-c", "--config", help="Specify a config to use")
    parser.add_argument("-i", "--init", help="Inits the config", action="store_true")
    parser.add_argument("-tc", "--test_config", help="Tests the config", action="store_true")

    parser.add_argument("-b", "--build", help="Runs mkdocs build", action="store_true")
    parser.add_argument("-d", "--deploy", help="Deploys built site", action="store_true")
    parser.add_argument("-s", "--serve", help="Serves site for testing", action="store_true")
    args = parser.parse_args()

    conf_path = None
    if args.config is not None:
        conf_path = args.config
    conf_path = load_config(conf_path)
    
    if args.init:
        print("[init] Building "+conf_path+" ...")
        with open(conf_path, 'w') as configfile:
            config.write(configfile)

    config.read(conf_path)

    if args.test_config:
        print("[test] Testing "+conf_path)
        print_config(config)


    if args.build:
        print("[build] Starting build")
        os.system("mkdocs build")

        import shutil, pathlib
        cwd = pathlib.Path.cwd()
        build_dir = pathlib.Path(config.get("build", "dir"))

        shutil.copy(str(cwd.joinpath(".htaccess")), str(build_dir))
        shutil.copy(str(cwd.joinpath("miners.ini")), str(build_dir))


    if args.deploy:
        import shutil, pathlib
        print("[deploy] Starting deploy")
        publish_dir_raw = config.get("deploy", "publish_dir")
        publish_dir = pathlib.Path(publish_dir_raw).absolute()

        build_dir_raw = config.get("build", "dir")
        build_dir = pathlib.Path(build_dir_raw).absolute()

        if publish_dir_raw == "":
            print("[deploy] deploy/publish_dir canont be empty")
            exit(-1)
        if not publish_dir.exists():
            print("[deploy] deploy/publish_dir ("+publish_dir_raw+") does not exist")
            exit(-1)

        if build_dir_raw == "":
            print("[deploy] build/build_dir canont be empty")
            exit(-1)
        if not build_dir.exists():
            print("[deploy] build/build_dir ("+build_dir_raw+") does not exist")
            exit(-1)

        print("[deploy] Deploying "+build_dir_raw+" to "+publish_dir_raw)
        shutil.copytree(
            build_dir, 
            publish_dir,
            dirs_exist_ok=True
        )

    if args.serve:
        print("[serve] Serving latest build")