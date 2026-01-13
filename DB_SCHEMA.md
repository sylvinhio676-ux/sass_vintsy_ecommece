# Description du schema de base de donnees

## Marketplace

### users
- name: nom d'affichage utilisateur
- email: email de connexion (unique)
- password: mot de passe hashé
- role: role utilisateur (admin/seller/customer)
- created_at, updated_at: dates de creation et mise a jour

### shops
- owner_id: utilisateur proprietaire de la boutique
- name: nom de la boutique
- slug: identifiant URL public (unique)
- description: description de la boutique
- logo_url: URL du logo
- banner_url: URL de la banniere
- policies: politiques de la boutique
- created_at, updated_at: dates de creation et mise a jour

### plans
- name: nom du plan (Starter/Pro/Scale)
- product_limit: limite de produits (NULL = illimite)
- price_monthly: prix mensuel

### subscriptions
- shop_id: boutique abonnée
- plan_id: plan actif
- status: statut (active/trial/canceled/past_due)
- started_at: date de debut
- ends_at: date de fin

### categories
- parent_id: categorie parente
- name: nom de la categorie
- slug: slug unique '

### attributes
- name: nom de l'attribut (ex: Size, Color)

### attribute_values
- attribute_id: attribut parent
- value: valeur de l'attribut

### products
- shop_id: boutique proprietaire
- category_id: categorie du produit
- title: titre
- description: description
- price: prix
- status: statut (draft/published/archived)
- sku: code SKU unique
- created_at, updated_at: dates de creation et mise a jour

### product_variants
- product_id: produit parent
- title: titre de la variante
- price: prix variante
- stock: stock variante
- sku: SKU variante unique

### product_images
- product_id: produit parent
- url: URL de l'image
- position: ordre d'affichage

### product_attribute_values
- product_id: produit lie
- attribute_value_id: valeur d'attribut liee

### carts
- user_id: proprietaire du panier
- created_at: date de creation du panier

### cart_items
- cart_id: panier parent
- product_id: produit
- variant_id: variante (nullable)
- quantity: quantite

### orders
- user_id: acheteur
- status: statut (pending/paid/shipped/delivered/canceled)
- total: total commande
- created_at, updated_at: dates de creation et mise a jour

### order_items
- order_id: commande parente
- shop_id: boutique vendeuse
- product_id: produit
- variant_id: variante (nullable)
- price: prix unitaire
- quantity: quantite

### shipments
- order_id: commande parente
- carrier: transporteur
- tracking_number: numero de suivi
- status: statut (preparing/shipped/delivered)
- shipped_at: date d'expedition
- delivered_at: date de livraison

### payments
- order_id: commande parente
- provider: fournisseur (stripe/paypal)
- amount: montant
- status: statut (paid/failed/refunded)
- created_at: date du paiement

### reviews
- product_id: produit note
- user_id: auteur de l'avis
- rating: note (1-5)
- comment: commentaire
- created_at: date de l'avis

### conversations
- shop_id: boutique
- user_id: client
- last_message: dernier message
- updated_at: derniere activite

### messages
- conversation_id: conversation parente
- sender_id: expediteur
- content: contenu du message
- created_at: date d'envoi

### notifications
- user_id: utilisateur cible
- type: type de notification
- data_json: donnees de notification
- created_at: date de notification

### coupons
- code: code promo
- discount_type: type (percent/fixed)
- discount_value: valeur de remise
- starts_at: date debut
- ends_at: date fin
- max_uses: nombre max d'utilisations

### disputes
- order_id: commande liee
- status: statut (open/resolved/rejected)
- reason: raison du litige
- created_at: date du litige

### pages
- title: titre de page
- slug: slug unique
- content: contenu
- updated_at: date de mise a jour

## Seller Panel (Vinted)

### seller_accounts
- shop_id: boutique liee
- name: nom du profil
- username: identifiant Vinted
- email: email Vinted
- password_hash: hash mot de passe
- avatar: avatar (lettre)
- is_connected: etat de connexion
- is_running: etat de session
- proxy_host, proxy_port, proxy_user, proxy_password: configuration proxy
- vnc_password: mot de passe VNC
- last_session_start: dernier demarrage de session
- created_at, updated_at: dates de creation et mise a jour

### seller_products
- shop_id: boutique liee
- sku: SKU interne
- title: titre
- description: description
- category: categorie
- brand: marque
- condition_status: etat
- size: taille
- price: prix
- purchase_cost: cout d'achat
- last_price: dernier prix
- quantity: quantite
- package_size: taille du colis
- status: statut
- internal_notes: notes internes
- created_at, updated_at: dates de creation et mise a jour

### seller_product_photos
- product_id: produit parent
- url: URL image
- position: ordre

### seller_product_materials
- product_id: produit parent
- material: matiere

### seller_product_colors
- product_id: produit parent
- color: couleur

### seller_product_publish_attempts
- product_id: produit parent
- seller_account_id: compte Vinted
- status: statut
- error_message: message d'erreur
- created_at: date de tentative

### seller_listings
- listing_id: ID annonce Vinted
- product_sku: SKU
- title: titre annonce
- photo_url: image annonce
- seller_account_id: compte Vinted
- price: prix
- status: statut
- last_sync: derniere synchronisation
- error_message: message d'erreur

### seller_published_listings
- product_id: produit parent
- sku: SKU
- title: titre
- description: description
- category: categorie
- brand: marque
- condition_status: etat
- material: matiere
- size: taille
- price: prix
- package_size: taille colis
- seller_account_id: compte Vinted
- vinted_listing_id: ID Vinted
- vinted_url: URL publique
- status: statut
- published_date: date de publication
- last_sync_date: derniere synchro
- boost_active: boost actif
- is_hidden: annonce masquee

### seller_published_listing_photos
- published_listing_id: annonce parente
- url: URL image
- position: ordre

### seller_listing_analytics
- published_listing_id: annonce parente
- views: nombre de vues
- favorites: nombre de favoris
- offers: nombre d'offres
- avg_offer_price: moyenne des offres
- best_offer_price: meilleure offre
- lowest_offer_price: plus basse offre
- views_trend: tendance vues
- favorites_trend: tendance favoris
- created_at: date statistique

### seller_listing_analytics_history
- published_listing_id: annonce parente
- metric: metrique (views/favorites/offers)
- value: valeur
- recorded_at: date enregistrement

### seller_listing_insights
- published_listing_id: annonce parente
- insight_type: type d'insight
- severity: severite
- data_json: donnees detaillees
- created_at: date insight

### seller_orders
- order_id: ID commande Vinted
- order_type: type (sale/purchase)
- source: source (vinted/manual)
- seller_account_id: compte Vinted
- title: titre
- sku: SKU
- price: prix
- status: statut
- category: categorie
- thumbnail_url: miniature
- buyer_name, buyer_username: infos acheteur
- seller_name, seller_username: infos vendeur
- shipping_street, shipping_city, shipping_postal_code, shipping_country: adresse livraison
- fees_item_price, fees_shipping_fee, fees_service_fee, fees_total: detail des frais
- processed: traite ou non
- purchase_cost: cout d'achat
- quantity: quantite
- tracking_number, tracking_carrier, tracking_url: infos suivi
- is_bundle: commande bundle
- created_at, updated_at: dates de creation et mise a jour

### seller_order_timelines
- order_id: commande parente
- status: statut timeline
- icon: icone
- occurred_at: date evenement

### seller_order_bundle_items
- order_id: commande parente
- title: titre item bundle
- sku: SKU
- thumbnail_url: image

### seller_conversations
- buyer_id: ID acheteur
- buyer_name: nom acheteur
- buyer_username: username acheteur
- buyer_avatar: avatar acheteur
- item_id: ID produit
- item_title: titre produit
- item_thumbnail: image produit
- item_price: prix
- last_message: dernier message
- last_message_time: date dernier message
- unread_count: nombre non lus
- seller_account_id: compte Vinted
- status: statut
- has_label: etiquette dispo

### seller_messages
- conversation_id: conversation parente
- sender_id: ID expediteur
- sender_name: nom expediteur
- sender_avatar: avatar expediteur
- content: contenu
- sent_at: date envoi
- is_me: message envoyé par moi
- image_url: image optionnelle
- original_language: langue d'origine

### seller_offers
- conversation_id: conversation parente
- sender_id: ID expediteur
- sender_name: nom expediteur
- sender_avatar: avatar expediteur
- amount: montant offre
- status: statut
- sent_at: date envoi
- is_me: message envoyé par moi
- message: message optionnel
- parent_offer_id: contre-offre

### seller_system_events
- conversation_id: conversation parente
- event_type: type d'evenement
- event_data: donnees JSON
- occurred_at: date evenement

### seller_notifications
- kind: type (sale/message/offer/system)
- title: titre
- details: details
- seller_account_id: compte Vinted
- created_at: date notification

### seller_favorites
- item_id: ID item
- item_title: titre item
- item_sku: SKU item
- item_price: prix
- item_thumbnail: image
- seller_account_id: compte Vinted
- user_handle: identifiant utilisateur
- user_name: nom utilisateur
- created_at: date favori
