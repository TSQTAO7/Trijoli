from django.contrib import admin
from .models import ArticleType, Article, Donor, DetailDonation, Destiny, DetailDelivery,EventConclusion, Sponsor, Event, DetailEvent
from import_export import resources
from import_export.admin import ImportExportModelAdmin

@admin.register(ArticleType)
class ArticleTypeAdmin(ImportExportModelAdmin):
    list_display = ['nombre_tipo']
    search_fields = ['nombre_tipo']

@admin.register(Article)
class ArticleAdmin(ImportExportModelAdmin):
    list_display = ['nombre', 'descripcion', 'tipo_articulo', 'id_empleado_fk_articulo']
    list_filter = ['tipo_articulo']
    search_fields = ['nombre']
    list_editable = []
    list_per_page = 10

@admin.register(Donor)
class DonorAdmin(ImportExportModelAdmin):
    list_display = ['nombre', 'correo', 'estado_d']
    search_fields = ['nombre']
    list_editable = []
    list_filter = []
    list_per_page = 10

@admin.register(DetailDonation)
class DetailDonationAdmin(ImportExportModelAdmin):
    list_display = ['id_articulo_fk', 'id_donante_fk', 'cantidad', 'fecha_entrada', 'descripcion']
    list_filter = ['id_articulo_fk', 'id_donante_fk']
    search_fields = []
    list_editable = []
    list_per_page = 10

@admin.register(Destiny)
class DestinyAdmin(ImportExportModelAdmin):
    list_display = ['fecha_entrega', 'id_articulo_fk']
    list_filter = ['id_articulo_fk']
    search_fields = []
    list_editable = []
    list_per_page = 10

@admin.register(DetailDelivery)
class DetailDeliveryAdmin(ImportExportModelAdmin):
    list_display = ['id_entrega_fk', 'cantidad', 'descripcion']
    filter_horizontal = ['id_articulofk']
    search_fields = []
    list_editable = []
    list_per_page = 10

@admin.register(Sponsor)
class SponsorAdmin(ImportExportModelAdmin):
    list_display = ['nombre_patrocinador', 'telefono_patrocinador']
    search_fields = ['nombre_patrocinador']
    list_editable = []
    list_filter = []
    list_per_page = 10

@admin.register(Event)
class EventAdmin(ImportExportModelAdmin):
    list_display = ['ubicacion', 'fecha_evento', 'id_patrocinador_fk_evento']
    search_fields = ['ubicacion']
    list_editable = []
    list_filter = []
    list_per_page = 10

@admin.register(DetailEvent)
class DetailEventAdmin(ImportExportModelAdmin):
    list_display = ['id_evento_fk', 'descripcion']
    filter_horizontal = ['idarticulo_fk']
    search_fields = []
    list_editable = []
    list_per_page = 10

@admin.register(EventConclusion)
class FinalEventoAdmin(ImportExportModelAdmin):
    list_display = ('evento_realizado', 'descripcion_evento')
    search_fields = ('evento_realizado__ubicacion', 'descripcion_evento')
    list_editable = ()
    list_filter = ('evento_realizado__ubicacion',)
    list_per_page = 1