from django.db import models
from django.contrib.auth.models import User
from simple_history.models import HistoricalRecords
from mdeditor.fields import MDTextField
import markdown as md
from main.models import User


STATUS = (
    (0,"Draft"),
    (1,"Publish")
)

class Category(models.Model):
    name = models.CharField(max_length=200)
    slug = models.SlugField(unique=True)
    description = models.TextField()

    class Meta:
        verbose_name_plural = "categories"

    def __str__(self):
        return self.name


class Tag(models.Model):
    name = models.CharField(max_length=200)
    slug = models.SlugField(unique=True)
    description = models.TextField()

    def __str__(self):
        return self.name

class Post(models.Model):
    title = models.CharField(max_length=200, unique=True)
    slug = models.SlugField(max_length=200, unique=True)
    author = models.ForeignKey(User, on_delete= models.CASCADE,related_name='blog_posts')
    updated_on = models.DateTimeField(auto_now= True)
    content = MDTextField()
    description = models.TextField()
    created_on = models.DateTimeField(auto_now_add=True)
    status = models.IntegerField(choices=STATUS, default=0)
    history = HistoricalRecords(user_model=User)
    category = models.ManyToManyField(Category, blank=True)
    tag = models.ManyToManyField(Tag, blank=True)

    class Meta:
        ordering = ['-created_on']

    @property
    def render(self):
        mdc = md.Markdown(extensions=['markdown.extensions.fenced_code', 'toc'])
        content = mdc.convert(self.content)
        return {
            "content": content,
            "toc": mdc.toc
        }

    def __str__(self):
        return self.title
