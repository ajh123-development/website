from mkdocs import utils as mkdocs_utils
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

    def on_files(self, files: Files, config):
        file: File
        for file in files.documentation_pages():
            files.remove(file)
            file.abs_dest_path = file.abs_dest_path.replace(".html", ".php")
            files.append(file)
            print(file.abs_dest_path)
        return files
