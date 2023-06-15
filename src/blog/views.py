from django.views import generic
import markdown as md
from .models import Post

class PostList(generic.ListView):
    queryset = Post.objects.filter(status=1).order_by('-created_on')
    template_name = 'blog/index.html'

class PostDetail(generic.DetailView):
    model = Post
    template_name = 'blog/post_detail.html'
    queryset = Post.objects.filter(status=1)

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        mdc = md.Markdown(extensions=['markdown.extensions.fenced_code', 'toc'])
        mdc.convert(context["object"].content)
        context["toc"] = mdc.toc
        return context
