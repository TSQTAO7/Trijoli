# Generated by Django 4.2.4 on 2023-09-10 00:56

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('core', '0004_remove_article_estado_calidad'),
    ]

    operations = [
        migrations.CreateModel(
            name='EventConclusion',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('descripcion_evento', models.TextField(verbose_name='Descripción del Evento')),
                ('comentarios_patrocinador', models.TextField(blank=True, null=True, verbose_name='Comentarios del Patrocinador')),
                ('comentarios_fundacion', models.TextField(blank=True, null=True, verbose_name='Comentarios de la Fundación')),
                ('cantidad_entregada', models.PositiveIntegerField(verbose_name='Cantidad Entregada')),
                ('cantidad_no_entregada', models.PositiveIntegerField(verbose_name='Cantidad Entregada')),
                ('articulos_entregados', models.ManyToManyField(related_name='entregados', to='core.article', verbose_name='Artículos Entregados')),
                ('articulos_no_entregados', models.ManyToManyField(related_name='no_entregados', to='core.article', verbose_name='Artículos No Entregados')),
                ('evento_realizado', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='core.event', verbose_name='Evento Realizado')),
            ],
            options={
                'verbose_name': 'Final de Evento',
                'verbose_name_plural': 'Finales de Evento',
                'db_table': 'final_evento',
                'ordering': ['id'],
            },
        ),
    ]
