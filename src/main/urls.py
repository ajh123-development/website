from . import views
from django.urls import path, include

urlpatterns = [
    path('', views.home, name='main_home'),
    path('accounts/', include('django.contrib.auth.urls')),
]