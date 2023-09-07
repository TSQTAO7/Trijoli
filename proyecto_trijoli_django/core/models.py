from django.db import models
from django.contrib.auth.models import User

class ArticleType(models.Model):
    nombre_tipo = models.CharField(max_length=30, verbose_name='Nombre del Tipo de Artículo')

    class Meta:
        verbose_name_plural = 'Tipos de Artículos'
        verbose_name = 'Tipo de Artículo'
        db_table = 'article_type'
        ordering = ['id']

    def __str__(self):
        return self.nombre_tipo

class Article(models.Model):
    nombre = models.CharField(max_length=30, verbose_name='Nombre')
    descripcion = models.TextField(max_length=100, verbose_name='Descripción', default='')
    tipo_articulo = models.ForeignKey(ArticleType, on_delete=models.CASCADE, verbose_name='Tipo de Artículo')
    id_empleado_fk_articulo = models.ForeignKey(User, on_delete=models.CASCADE, verbose_name='Empleado')

    class Meta:
        verbose_name_plural = 'Artículos'
        verbose_name = 'Artículo'
        db_table = 'article'
        ordering = ['id']

    def __str__(self):
        return self.nombre

class Donor(models.Model):
    nombre = models.CharField(max_length=50, verbose_name='Nombre')
    correo = models.CharField(max_length=50, verbose_name='Correo')
    estado_d = models.CharField(max_length=30, verbose_name='Estado')

    class Meta:
        verbose_name_plural = 'Donantes'
        verbose_name = 'Donante'
        db_table = 'donor'
        ordering = ['id']

    def __str__(self):
        return self.nombre

class DetailDonation(models.Model):
    id_articulo_fk = models.ForeignKey(Article, on_delete=models.CASCADE, verbose_name='Artículo')
    id_donante_fk = models.ForeignKey(Donor, on_delete=models.CASCADE, verbose_name='Donante')
    cantidad = models.IntegerField(verbose_name='Cantidad')
    fecha_entrada = models.DateField(verbose_name='Fecha de Entrada')
    descripcion = models.TextField(max_length=100, verbose_name='Descripción')

    class Meta:
        verbose_name_plural = 'Detalles de Donaciones'
        verbose_name = 'Detalle de Donación'
        db_table = 'detail_donation'
        ordering = ['id']

    def __str__(self):
        return f"{self.id_articulo_fk} - {self.id_donante_fk}"

class Destiny(models.Model):
    fecha_entrega = models.DateField(verbose_name='Fecha de Entrega')
    id_articulo_fk = models.ForeignKey(Article, on_delete=models.CASCADE, verbose_name='Artículo', default=None)

    class Meta:
        verbose_name_plural = 'Destinos'
        verbose_name = 'Destino'
        db_table = 'destiny'
        ordering = ['id']

    def __str__(self):
        return f"Destino - {self.articulo_entregado}"

class DetailDelivery(models.Model):
    id_articulofk = models.ManyToManyField(Article, verbose_name='Artículos')
    id_entrega_fk = models.ForeignKey(Destiny, on_delete=models.CASCADE, verbose_name='Entrega')
    cantidad = models.IntegerField(verbose_name='Cantidad')
    descripcion = models.TextField(max_length=100, verbose_name='Descripción')

    class Meta:
        verbose_name_plural = 'Detalles de Entrega'
        verbose_name = 'Detalle de Entrega'
        db_table = 'detail_delivery'
        ordering = ['id']

    def __str__(self):
        return f"{', '.join(str(articulo) for articulo in self.id_articulofk.all())} - {self.id_entrega_fk}"

class Sponsor(models.Model):
    nombre_patrocinador = models.CharField(max_length=30, verbose_name='Nombre del Patrocinador')
    telefono_patrocinador = models.IntegerField(verbose_name='Teléfono del Patrocinador')

    class Meta:
        verbose_name_plural = 'Patrocinadores'
        verbose_name = 'Patrocinador'
        db_table = 'sponsor'
        ordering = ['id']

    def __str__(self):
        return self.nombre_patrocinador

class Event(models.Model):
    ubicacion = models.CharField(max_length=30, verbose_name='Ubicación')
    fecha_evento = models.DateField(verbose_name='Fecha del Evento')
    id_patrocinador_fk_evento = models.ForeignKey(Sponsor, on_delete=models.CASCADE, verbose_name='Patrocinador')

    class Meta:
        verbose_name_plural = 'Eventos'
        verbose_name = 'Evento'
        db_table = 'event'
        ordering = ['id']

    def __str__(self):
        return f"Evento - {self.ubicacion}"

class DetailEvent(models.Model):
    idarticulo_fk = models.ManyToManyField(Article, verbose_name='Artículos')
    id_evento_fk = models.ForeignKey(Event, on_delete=models.CASCADE, verbose_name='Evento')
    descripcion = models.TextField(max_length=100, verbose_name='Descripción')

    class Meta:
        verbose_name_plural = 'Detalles de Eventos'
        verbose_name = 'Detalle de Evento'
        db_table = 'detalle_evento'
        ordering = ['id']

    def __str__(self):
        return f"{', '.join(str(articulo) for articulo in self.idarticulo_fk.all())} - {self.id_evento_fk}"
