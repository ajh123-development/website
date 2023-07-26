from . import views
from django.urls import path

urlpatterns = [
    path(
        '<slug:category>/',
        views.post_detail,
        kwargs={'slug': None},
        name='category_view'
    ),
    path(
        '<slug:category>/<slug:slug>/',
        views.post_detail,
        name='post_view'
    ),
]