"""
URL configuration for proyecto_trijoli_django project.

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/4.2/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path	
from . import views
from django.contrib.auth import views as auth_views


urlpatterns = [
    path('admin/', admin.site.urls),

    path('password_reset/', auth_views.PasswordResetView.as_view(template_name="password-reset.html"), name="password_reset"),
    path('password_reset/done', auth_views.PasswordResetDoneView.as_view(), name="password_reset_done"),
    path('reset/<uidb64>/<token>', auth_views.PasswordResetConfirmView.as_view(), name="password_reset_confirm"),
    path('reset/done/', auth_views.PasswordResetCompleteView.as_view(), name="password_reset_complete"),
    

    path('', admin.site.urls, name='index'), 
    path('articulo/', views.articulo, name='articulo'),
    path('brigada/', views.brigada, name='brigada'),    
    path('dest/', views.dest, name='dest'),
    path('Detalle_donacion/', views.Detalle_donacion, name='Detalle_donacion'),
    path('donante/', views.donante, name='donante'),
    path('Empleadousu/', views.Empleadousu, name='Empleadousu'),
    path('Insert/', views.Insert, name='Insert'),
    path('logout/', views.logout_view, name='logout'),
]
