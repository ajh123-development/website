config = None

def print_config(config, start_key=None):
    from configparser import SectionProxy
    if start_key is not None:
        print(start_key)
    for key in config:
        iterable = False
        if isinstance(config[key], SectionProxy):
            iterable = True
        if iterable:
            print_config(config[key], key)
        else:
            print("  "+key+"= "+config[key])

def load_config(conf_path):
    global config
    import configparser, pathlib
    cwd = pathlib.Path.cwd()
    if conf_path is None:
        
        conf_path = str(pathlib.Path.joinpath(cwd, "miners.ini"))
        input_dir = pathlib.Path.joinpath(cwd, "site")

        config = configparser.ConfigParser()
        config["serve"] = {
            "input_dir": input_dir
        }
        config["deploy"] = {
            "input_dir": input_dir,
            "out_dir": ""
        }
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
        print("Building "+conf_path+" ...")
        with open(conf_path, 'w') as configfile:
            config.write(configfile)

    config.read(conf_path)

    if args.test_config:
        print("Testing "+conf_path)
        print_config(config)


    if args.build:
        print("Starting build")
        os.system("mkdocs build")

    if args.deploy:
        print("Deploying build")

    if args.serve:
        print("Serving build")