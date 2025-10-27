# Faro Immobiliare - WordPress Theme & Plugin

Tema WordPress professionale e plugin completo per agenzia immobiliare.

## 🏠 Caratteristiche

### Tema WordPress (agency-theme)

- Design moderno e responsive
- Colori professionali (verde come accento)
- Template per proprietà singole e archivi
- Form di ricerca avanzata con filtri
- Integrazione Schema.org per SEO
- Performance ottimizzate

### Plugin (Faro Immobiliare Plugin)

- Custom Post Type "Proprietà"
- Tassonomie (tipologie, località)
- Metabox avanzati (prezzo, mq, camere, bagni, indirizzo)
- Pannello amministrativo personalizzato
- REST API per integrazione frontend
- Completamente in italiano

## 🚀 Installazione

1. Copia il tema in `/wp-content/themes/agency-theme/`
2. Copia il plugin in `/wp-content/plugins/faro-immobiliare-plugin/`
3. Attiva tema e plugin dal pannello WordPress
4. Vai su "Immobili" per gestire le proprietà

## 📋 Campi Proprietà

- **Prezzo** - Valore in euro
- **Superficie** - Metri quadri
- **Camere** - Numero camere
- **Bagni** - Numero bagni
- **Indirizzo** - Ubicazione
- **Stato** - Vendita/Affitto/Venduto
- **Tipologia** - Casa, Appartamento, etc.
- **Località** - Zone geografiche

## 🎨 Personalizzazione

Il tema utilizza CSS custom properties per facile personalizzazione:

```css
:root {
  --primary: #1a1a1a;
  --accent: #28a745;
  --light: #f8f9fa;
}
```

## 🔧 Sviluppo

- **Tema**: `/wp-themes/agency-theme/`
- **Plugin**: `/wp-plugins/faro-immobiliare-plugin/`
- **Docker**: Ambiente di sviluppo incluso

## 📱 Responsive

Completamente responsive con breakpoint:

- Desktop: 1200px+
- Tablet: 768px-1199px
- Mobile: <768px

## 🔒 Sicurezza

- Sanitizzazione completa input/output
- Nonce per tutti i form
- Escape di tutti i dati
- Validazione server-side

## 📄 Licenza

GPL v2 or later
