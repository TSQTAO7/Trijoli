from django.shortcuts import render

def index(request):
 
    return render(request, 'index.html')

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
