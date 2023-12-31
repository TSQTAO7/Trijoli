# Generated by Django 4.2.4 on 2023-09-05 01:13

from django.conf import settings
from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
    ]

    operations = [
        migrations.CreateModel(
            name='Article',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nombre', models.CharField(max_length=30, verbose_name='Nombre')),
                ('estado_actividad', models.CharField(max_length=30, verbose_name='Estado de Actividad')),
                ('tipo_articulo', models.CharField(max_length=30, verbose_name='Tipo de Artículo')),
                ('estado_calidad', models.CharField(max_length=30, verbose_name='Estado de Calidad')),
                ('id_empleado_fk_articulo', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to=settings.AUTH_USER_MODEL, verbose_name='Empleado')),
            ],
            options={
                'verbose_name': 'Artículo',
                'verbose_name_plural': 'Artículos',
                'db_table': 'article',
                'ordering': ['id'],
            },
        ),
        migrations.CreateModel(
            name='Destiny',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('fecha_entrega', models.DateField(verbose_name='Fecha de Entrega')),
                ('articulo_entregado', models.CharField(max_length=30, verbose_name='Artículo Entregado')),
            ],
            options={
                'verbose_name': 'Destino',
                'verbose_name_plural': 'Destinos',
                'db_table': 'destiny',
                'ordering': ['id'],
            },
        ),
        migrations.CreateModel(
            name='Donor',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nombre', models.CharField(max_length=50, verbose_name='Nombre')),
                ('correo', models.CharField(max_length=50, verbose_name='Correo')),
                ('estado_d', models.CharField(max_length=30, verbose_name='Estado')),
            ],
            options={
                'verbose_name': 'Donante',
                'verbose_name_plural': 'Donantes',
                'db_table': 'donor',
                'ordering': ['id'],
            },
        ),
        migrations.CreateModel(
            name='Sponsor',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nombre_patrocinador', models.CharField(max_length=30, verbose_name='Nombre del Patrocinador')),
                ('telefono_patrocinador', models.IntegerField(verbose_name='Teléfono del Patrocinador')),
            ],
            options={
                'verbose_name': 'Patrocinador',
                'verbose_name_plural': 'Patrocinadores',
                'db_table': 'sponsor',
                'ordering': ['id'],
            },
        ),
        migrations.CreateModel(
            name='Event',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('ubicacion', models.CharField(max_length=30, verbose_name='Ubicación')),
                ('fecha_evento', models.DateField(verbose_name='Fecha del Evento')),
                ('id_patrocinador_fk_evento', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='core.sponsor', verbose_name='Patrocinador')),
            ],
            options={
                'verbose_name': 'Evento',
                'verbose_name_plural': 'Eventos',
                'db_table': 'event',
                'ordering': ['id'],
            },
        ),
        migrations.CreateModel(
            name='DetailEvent',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('ropa_evento', models.BooleanField(verbose_name='Ropa en el Evento')),
                ('cantidad_ropa', models.IntegerField(null=True, verbose_name='Cantidad de Ropa')),
                ('comida_evento', models.BooleanField(verbose_name='Comida en el Evento')),
                ('cantidad_comida', models.IntegerField(null=True, verbose_name='Cantidad de Comida')),
                ('tipo_comida', models.CharField(max_length=30, null=True, verbose_name='Tipo de Comida')),
                ('descripcion', models.TextField(max_length=100, verbose_name='Descripción')),
                ('id_evento_fk', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='core.event', verbose_name='Evento')),
                ('idarticulo_fk', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='core.article', verbose_name='Artículo')),
            ],
            options={
                'verbose_name': 'Detalle de Evento',
                'verbose_name_plural': 'Detalles de Eventos',
                'db_table': 'detalle_evento',
                'ordering': ['id'],
            },
        ),
        migrations.CreateModel(
            name='DetailDonation',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('cantidad', models.IntegerField(verbose_name='Cantidad')),
                ('fecha_entrada', models.DateField(verbose_name='Fecha de Entrada')),
                ('descripcion', models.TextField(max_length=100, verbose_name='Descripción')),
                ('id_articulo_fk', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='core.article', verbose_name='Artículo')),
                ('id_donante_fk', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='core.donor', verbose_name='Donante')),
            ],
            options={
                'verbose_name': 'Detalle de Donación',
                'verbose_name_plural': 'Detalles de Donaciones',
                'db_table': 'detail_donation',
                'ordering': ['id'],
            },
        ),
        migrations.CreateModel(
            name='DetailDelivery',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('cantidad', models.IntegerField(verbose_name='Cantidad')),
                ('descripcion', models.TextField(max_length=100, verbose_name='Descripción')),
                ('id_articulofk', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='core.article', verbose_name='Artículo')),
                ('id_entrega_fk', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='core.destiny', verbose_name='Entrega')),
            ],
            options={
                'verbose_name': 'Detalle de Entrega',
                'verbose_name_plural': 'Detalles de Entrega',
                'db_table': 'detail_delivery',
                'ordering': ['id'],
            },
        ),
    ]
