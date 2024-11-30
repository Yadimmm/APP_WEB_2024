from django.urls import path
from . import views

urlpatterns = [

    path('listado_articulos/',views.list_art, name='articulos'),
    path('listado_categoria/',views.list_cat, name='categorias'),

]

