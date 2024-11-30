from django.shortcuts import render, redirect

# Create your views here.

def index_view(requests):
    return render(requests, 'mainapp/index.html',{
        'title': 'Inicio | Pagina Principal',
        'content': 'Este es el inicio de la página'
    })

def about_view(requests):
    return render(requests, 'mainapp/about.html',{
        'title': 'Página | Nosotros',
        'content': 'Este es el about'
    })

def mision_view(requests):
    return render(requests, 'mainapp/mision.html',{
        'title': 'Página | Mision',
        'content': 'Nuestra Mision'
    })


def vision_view(requests):
    return render(requests, 'mainapp/vision.html',{
        'title': 'Página | Vision',
        'content': 'Esta es la página que contiene la vision'
    })

def inicio_sesion(requests):
    return render(requests, 'users/login.html',{
        'title': 'Página | Inicio Sesion',
        'content': 'Aqui vendrá el Formulario de Inicio de Sesion'
    })

def registro(requests):
    return render(requests, 'users/registro.html',{
        'title': 'Página | Registro',
        'content': 'Aqui vendrá el Formulario de Registro'
    })

def redirigir_usuario(request, exception):
    return render(request, 'mainapp/404.html')