from django.db import models

# Create your models here.
Statuschoices = (
        ("Done", "Done"),
        ("Active", "Active"),
        ("Deleted", "Deleted")
    )
class Tasks(models.Model):
    Tasks = models.TextField()
    # class Statuschoices(models.TextChoices):
    #     Done = "Done"
    #     Active = "Active"
    #     Deleted = "Deleted"
    Status = models.TextField(choices = Statuschoices)
    def __str__(self):
        return f"{self.Tasks}"