from django.http import Http404
from django.shortcuts import render
from blog.models import Post


def home(request):
	posts = Post.objects.all()
	return render(request, "index.html", {"post_list": posts})
