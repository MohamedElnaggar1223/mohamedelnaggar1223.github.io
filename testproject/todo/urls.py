from django.urls import path

from . import views

app_name = "todo"

urlpatterns = [
    path("", views.index, name="index"),
    path("<int:task_id>", views.delete, name="delete"),
    path("edit/<int:task_id>", views.edit, name="edit"),
    path("done/<int:task_id>", views.done, name="done"),
    path("saved/<int:task_id>", views.save, name="save")
]
