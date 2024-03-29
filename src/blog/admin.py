from django.contrib import admin
from simple_history.admin import SimpleHistoryAdmin
from .models import Post

class PostAdmin(SimpleHistoryAdmin):
    list_display = ('title', 'slug', 'status','created_on')
    list_filter = ("status",)
    search_fields = ['title', 'content']
    prepopulated_fields = {'slug': ('title',)}

admin.site.register(Post, PostAdmin)
