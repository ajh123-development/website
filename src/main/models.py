from django.db import models
from django.contrib.auth.models import AbstractUser
from simple_history.models import HistoricalRecords

class User(AbstractUser):
	history = HistoricalRecords()
	class Meta:
		db_table = 'auth_user'
