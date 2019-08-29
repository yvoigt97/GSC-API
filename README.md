# GSC-API
Zugriff auf Website-KPI's via Google's Search Console - API

Für das ausführen diesen Skripts muss Python, sowie die pip-Module *google-api-python-client* und *oauth2client* installiert sein. Die Python-Version muss mindestens 3.0 sein.

Der Zugriff erfolgt derzeit noch per Kommandozeile. 
Das Schema ist folgendes:                 

	python search_analytics_api_sample.py [URL] [STARTDATUM] [ENDDATUM]
		
Beispiel:                     

	python search_analytics_api_sample.py https://example.com 2019-05-01 2019-05-30

Für das erfolgreiche Ausführen muss man sich über einen Link authorisieren. Dieser wird beim ersten Ausführen angezeigt.
