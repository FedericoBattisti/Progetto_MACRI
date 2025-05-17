```mermaid
graph TD
    A[API in Laravel] --> B[🌟 Principi Fondamentali]
    A --> C[🧩 Componenti Chiave di Laravel per API]

    B --> D[🧭 Architettura RESTful]
    B --> E[🔗 Comunicazione Stateless]
    B --> F[🎯 Orientamento alle Risorse]

    C --> G[🛣️ Routing API]
    C --> H[📂 Controller]
    C --> I[📥 Gestione delle Richieste (Request)]
    C --> J[📤 Gestione delle Risposte (Response)]
    C --> K[🔒 Autenticazione API]
    C --> L[🛠️ API Resources]

    G --> M[📄 File routes/api.php]
    G --> N[➡️ Verbi HTTP <br>(GET, POST, PUT, DELETE)]
    G --> O[🗂️ Route Grouping <br> e Prefixing]

    H --> P[⚙️ Logica di Business]
    H --> Q[📦 Controller di Risorsa <br>(Resource Controllers)]

    I --> R[🔧 Classe <br> Illuminate\Http\Request]
    I --> S[✔️ Validazione dei Dati]

    J --> T[📑 Risposte JSON]
    J --> U[🔢 Status Code HTTP]

    K --> V[🪪 Laravel Sanctum]
    K --> W[🔑 Autenticazione <br> basata su Token <br> (es. JWT)]

    L --> X[🔄 Trasformazione Dati <br> Modelli Eloquent]
    L --> Y[📚 Collections <br> di Risorse]
    L --> Z[📝 Attributi Condizionali]

    V --> A1[🌐 Autenticazione SPA]
    V --> A2[📱 Autenticazione <br> Mobile/API Token]
```