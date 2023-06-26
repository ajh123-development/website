from . import views
from django.urls import path, include

urlpatterns = [
    path('', views.home, name='main_home'),
    path('accounts/profile/', views.profile, name='main_profile'),
    path('accounts/', include('django.contrib.auth.urls')),
]