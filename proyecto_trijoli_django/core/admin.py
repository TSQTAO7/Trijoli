from django.contrib import admin
from .models import Article, Donor, DetailDonation, Destiny, DetailDelivery, Sponsor, Event, DetailEvent

admin.site.register(Article)
admin.site.register(Donor)
admin.site.register(DetailDonation)
admin.site.register(Destiny)
admin.site.register(DetailDelivery)
admin.site.register(Sponsor)
admin.site.register(Event)
admin.site.register(DetailEvent)
# Register your models here.
