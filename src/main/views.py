from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from blog.models import Post


def home(request):
	posts = Post.objects.all()
	return render(request, "index.html", {"post_list": posts})

@login_required
def profile(request):
	return render(request, 'users/profile.html')
