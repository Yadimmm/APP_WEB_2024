from django.shortcuts import render, redirect
from django.contrib.auth.forms import UserCreationForm
from django.contrib.auth import authenticate, login, logout
from django.contrib import messages
from django.contrib.auth.decorators import login_required
from mainapp.forms import Register_form
# Create your views here.

def index_view(requests):
    return render(requests, 'mainapp/index.html',{
        'title': 'Inicio | Pagina Principal',
        'content': '.:: ¡Bienvenido a mi pagina de Inicio! ::. '
    })
@login_required(login_url='inicio')
def about_view(requests):
    return render(requests, 'mainapp/about.html',{
        'title': 'Página | Nosotros',
        'content': 'Somos un equipo destinado al desarrollo de SW'
    })

@login_required(login_url='inicio')
def mision_view(requests):
    return render(requests, 'mainapp/mision.html',{
        'title': 'Página | Mision',
        'content': 'Nuestra Mision es bla bla ba nlanalnalsnd'
    })

@login_required(login_url='inicio')
def vision_view(requests):
    return render(requests, 'mainapp/vision.html',{
        'title': 'Página | Vision',
        'content': 'Esta es la página que contiene la vision de la agencia'
    })

#def redirigir_usuario(request, exception=None): #se usa para manejar errores 404 (páginas no encontradas)
    #return redirect('inicio/') 

def inicio_sesion(requests):

    if requests.user.is_authenticated:
       return redirect('inicio')
    else:
        if requests.method == "POST":
           username=requests.POST.get('username')
           password=requests.POST.get('password')

           user=authenticate(requests,username=username,password=password)

           if user is not None:
              login(requests,user)
              messages.success(requests,"Bienvenido al inicio de sesion")
              return redirect('inicio')
           
           else:
              messages.success(requests, "No es posible iniciar seción, porfavor ingresa tus credenciales de acceso")
        return render(requests, 'users/login.html',{
            'title': 'Página | Inicio Sesion',
            
        })



# def registrarse(request):

#   if request.user.is_authenticated:
#     return redirect('inicio')
#   else:
#      register_form=Register_form()

#      if request.method == "POST":
#        register_form=Register_form(request.POST)

#        if register_form.is_valid():
#           register_form.save()
#           messages.success(request,"¡Registro con Éxito")
#           return redirect('inicio')
          
#      return render(request,'users/registro.html',{
#      'title':'Registro de Usuario',
#      'register_form':register_form
#      })


def registrarse(request):
    if request.user.is_authenticated:
        return redirect('inicio')
    
    else:
        register_form=Register_form()

        if request.method == "POST":
            register_form=Register_form(request.POST)

            if register_form.is_valid():
                register_form.save()
                messages.success(request, "Eaaaaa se registró")
                return redirect('inicio')
        return render(request, 'users/registro.html', {
            'title':'Página| Registro',
            'register_form':register_form
        })







def cerrar_sesion(request):
   logout(request)
   return redirect('login')


def redirigir_usuario(request, exception):
    return render(request, 'mainapp/404.html')
