from django.urls import path
from . import views

urlpatterns = [
    path('inicio/',views.index_view, name='inicio'),
    path('about/',views.about_view, name='about'),
    path('mision/',views.mision_view, name='mision'),
    path('vision/',views.vision_view, name='vision'),
    path('',views.index_view, name='inicio'),
    path('login/',views.inicio_sesion, name='login'),
    path('registro/',views.registro, name='registro'),

]
