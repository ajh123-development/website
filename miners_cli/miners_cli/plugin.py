import os
from mkdocs.config import config_options, Config
from mkdocs.plugins import BasePlugin
from mkdocs.structure.files import Files
from mkdocs.structure.files import File

class YourPlugin(BasePlugin):

    config_scheme = (
        ('param', config_options.Type(str, default='')),
    )

    def __init__(self):
        self.enabled = True
        self.total_time = 0

    def on_post_build(self, config):
        outs = os.listdir(config["site_dir"])
        for file in outs:
            if file in config["extra_changes"]:
                path = os.path.join(config["site_dir"], file)
                dst_path = os.path.join(config["site_dir"], file.replace(".html", ".php"))
                os.rename(path, dst_path)

        

    def on_files(self, files: Files, config):
        file: File
        for file in files.documentation_pages():
            files.remove(file)
            file.abs_dest_path = file.abs_dest_path.replace(".html", ".php")
            files.append(file)
        return files
