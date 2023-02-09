from django.shortcuts import render, redirect
from .models import Tasks


# Create your views here.
donetasksid = []
def main(request):
    return redirect("/todo")
def index(request):
    if request.method == "GET":
        return render(request, "todo/index.html", {
            "tasks": Tasks.objects.all(),
            "donetasks": donetasksid
        })
    else:
        newtask = request.POST['taskq']
        newadd = Tasks(Tasks=f"{newtask}", Status="Active")
        newadd.save()
        return render(request, "todo/index.html", {
            "tasks": Tasks.objects.all(),
            "donetasks": donetasksid
        })
def delete(request, task_id):
        if request.method == "POST":
            deletetask = Tasks.objects.get(id=task_id)
            deletetask.delete()
            return redirect("/todo")
        else:
             return redirect("/todo")
def edit(request, task_id):
        if request.method == "POST":
            # edittask = Tasks.objects.get(id=task_id)
            return render(request, "todo/edit.html", {
                 "idofedit" : task_id,
                 "tasks": Tasks.objects.all()
            })
        else:
             return redirect("/todo")
def save(request, task_id):
        if request.method == "POST":
            savedtask = request.POST["savetask"]
            edited = Tasks.objects.get(id=task_id)
            edited.Tasks = f"{savedtask}"
            edited.save()
            return redirect("/todo")
        else:
             return redirect("/todo")
def done(request, task_id):
        if request.method == "POST":
            donetasksid.append(task_id)
            return redirect("/todo")
        else:
             return redirect("/todo")