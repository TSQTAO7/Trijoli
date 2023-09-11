from django.shortcuts import render
from django.shortcuts import render
from django.shortcuts import redirect
from django.contrib.auth import login
from django.contrib.auth import logout
from django.contrib.auth import authenticate
from django.contrib import messages


def logout_view(request):
    logout(request)
    messages.success(request, 'Sesión finalizada')
    return redirect('login')

def index(request):
 
    return render(request, '')

def articulo(request):
 
    return render(request, 'articulo.html')

def brigada(request):
 
    return render(request, 'brigada.html')

def dest(request):
    
    return render(request, 'dest.html')

def Detalle_donacion(request):
    
    return render(request, 'Detalle_donacion.html')

def donante(request):
  
    return render(request, 'donante.html')

def Empleadousu(request):
 
    return render(request, 'Empleadousu.html')

def Insert(request):
   
    return render(request, 'Insert.html')
