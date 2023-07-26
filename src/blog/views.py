from django.http import Http404
from django.shortcuts import render, get_object_or_404
import markdown as md
from .models import Post, Category

def post_detail(request, category = None, slug = None):
    if category is not None and slug is None:
        categoryObj: Category = get_object_or_404(Category, slug=category)
        posts = Post.objects.filter(category=categoryObj)
        return render(request, "blog/category_view.html", {
            "post_list": posts,
            "category": categoryObj
        })
    elif slug is not None:
        categoryObj: Category = get_object_or_404(Category, slug=category)
        post: Post = get_object_or_404(Post, slug=slug)
        if post is not None and post.category.all().contains(categoryObj):
            mdc = md.Markdown(extensions=['markdown.extensions.fenced_code', 'toc'])
            content = mdc.convert(post.content)
            return render(request, "blog/post_view.html", {
                "toc": mdc.toc,
                "category": category,
                "post": post,
                "content": content
            })
        raise Http404
    raise Http404
