from django.contrib import admin
from simple_history.admin import SimpleHistoryAdmin
from .models import User

admin.site.register(User, SimpleHistoryAdmin)
