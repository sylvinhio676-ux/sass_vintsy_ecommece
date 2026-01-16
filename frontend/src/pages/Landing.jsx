import { Link } from "react-router-dom";
import { useAuth } from "../auth/AuthContext";
import "./Landing.css";

export default function Landing() {
  const { user } = useAuth();
  const primaryHref = user ? "/dashboard" : "/register";
  const primaryLabel = user ? "Acceder au tableau de bord" : "Creer ma boutique";
  const secondaryHref = user ? "/shops" : "/login";
  const secondaryLabel = user ? "Parcourir les boutiques" : "Se connecter";

  return (
    <div className="landing-root">
      <header className="landing-header">
        <div className="landing-container landing-nav">
          <div className="brand">
            <span className="brand-mark">VINTSY</span>
            <span className="brand-tag">Marketplace full-stack</span>
          </div>
          <nav className="nav-links">
            <Link to="/shops">Boutiques</Link>
            <Link to="/login">Vendeur</Link>
            <Link to="/dashboard">Admin</Link>
          </nav>
          <div className="nav-cta">
            <Link className="btn-ghost" to={secondaryHref}>
              {secondaryLabel}
            </Link>
            <Link className="btn-primary" to={primaryHref}>
              {primaryLabel}
            </Link>
          </div>
        </div>
      </header>

      <main className="landing-main">
        <section className="landing-hero">
          <div className="landing-container hero-grid">
            <div className="hero-copy fade-up">
              <p className="eyebrow">Commerce multi-boutiques pour marques et revendeurs</p>
              <h1 className="hero-title">
                Une boutique en ligne complete avec espace admin, vendeurs et clients.
              </h1>
              <p className="hero-subtitle">
                Centralisez vos boutiques, produits, commandes et conversations.
                Chaque vendeur dispose de sa propre vitrine, avec des quotas par abonnement.
              </p>
              <div className="hero-actions">
                <Link className="btn-primary" to={primaryHref}>
                  {primaryLabel}
                </Link>
                <Link className="btn-ghost" to="/register">
                  Voir les plans
                </Link>
              </div>
              <div className="hero-stats">
                <div>
                  <p className="stat-value">3 roles</p>
                  <p className="stat-label">Admin, vendeur, client</p>
                </div>
                <div>
                  <p className="stat-value">Quota smart</p>
                  <p className="stat-label">Limites par abonnement</p>
                </div>
                <div>
                  <p className="stat-value">360 deg</p>
                  <p className="stat-label">Produit a livraison</p>
                </div>
              </div>
            </div>
            <div className="hero-panel fade-up delay-1">
              <div className="panel-card">
                <p className="panel-title">Apercu vendeur</p>
                <div className="panel-row">
                  <span>Produits actifs</span>
                  <strong>128</strong>
                </div>
                <div className="panel-row">
                  <span>Commandes en cours</span>
                  <strong>17</strong>
                </div>
                <div className="panel-row">
                  <span>Messages non lus</span>
                  <strong>5</strong>
                </div>
                <div className="panel-progress">
                  <div>
                    <p>Quota plan Pro</p>
                    <span>128 / 200</span>
                  </div>
                  <div className="progress-bar">
                    <div className="progress-fill" style={{ width: "64%" }} />
                  </div>
                </div>
                <div className="panel-highlight">
                  <p>Conseil IA</p>
                  <span>Publiez 3 nouvelles photos pour booster vos ventes.</span>
                </div>
              </div>
              <div className="panel-card alt">
                <p className="panel-title">Vue client</p>
                <div className="panel-row">
                  <span>Vendeurs suivis</span>
                  <strong>24</strong>
                </div>
                <div className="panel-row">
                  <span>Panier actif</span>
                  <strong>4</strong>
                </div>
                <div className="panel-row">
                  <span>Livraisons en cours</span>
                  <strong>2</strong>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section className="landing-section">
          <div className="landing-container">
            <div className="section-header">
              <h2>Une experience claire pour chaque role</h2>
              <p>
                Admin pour piloter la marketplace, vendeurs pour gerer leur boutique,
                clients pour acheter, discuter et suivre la livraison.
              </p>
            </div>
            <div className="role-grid">
              <article className="role-card fade-up delay-1">
                <h3>Admin</h3>
                <p>Supervise les boutiques, les abonnements, les paiements et les litiges.</p>
                <ul>
                  <li>Controle des vendeurs et des plans</li>
                  <li>Moderation produits &amp; avis</li>
                  <li>Tableau de bord global</li>
                </ul>
              </article>
              <article className="role-card fade-up delay-2">
                <h3>Vendeur</h3>
                <p>Cree une boutique avec sa marque, son catalogue et son staff.</p>
                <ul>
                  <li>Gestion des stocks et variantes</li>
                  <li>Commandes, livraison, retours</li>
                  <li>Messagerie client integree</li>
                </ul>
              </article>
              <article className="role-card fade-up delay-3">
                <h3>Client</h3>
                <p>Explore les boutiques, passe commande et suit chaque etape.</p>
                <ul>
                  <li>Panier rapide &amp; paiement securise</li>
                  <li>Suivi livraison temps reel</li>
                  <li>Favoris, avis et conversations</li>
                </ul>
              </article>
            </div>
          </div>
        </section>

        <section className="landing-section alt-surface">
          <div className="landing-container feature-grid">
            <div className="feature-card fade-up">
              <h3>Catalogue multi-boutiques</h3>
              <p>Chaque vendeur a sa vitrine, ses produits, ses promotions et ses stats.</p>
            </div>
            <div className="feature-card fade-up delay-1">
              <h3>Abonnements &amp; quotas</h3>
              <p>Plan Starter, Pro ou Scale avec limites de produits et options premium.</p>
            </div>
            <div className="feature-card fade-up delay-2">
              <h3>Commande unifiee</h3>
              <p>Paiement, expédition, suivi et notifications dans un seul flux.</p>
            </div>
            <div className="feature-card fade-up delay-3">
              <h3>Messagerie temps reel</h3>
              <p>Clients et vendeurs discutent sans quitter la plateforme.</p>
            </div>
          </div>
        </section>

        <section className="landing-section">
          <div className="landing-container steps-grid">
            <div className="section-header">
              <h2>De la creation a la vente, en 4 etapes</h2>
              <p>Un parcours clair pour lancer une boutique et vendre rapidement.</p>
            </div>
            <div className="steps">
              {[
                "Creer un compte vendeur et choisir un plan.",
                "Construire la boutique et publier les produits.",
                "Recevoir les commandes et organiser la livraison.",
                "Analyser les performances et fideliser les clients.",
              ].map((step, index) => (
                <div key={step} className={`step-card fade-up delay-${index + 1}`}>
                  <span className="step-index">0{index + 1}</span>
                  <p>{step}</p>
                </div>
              ))}
            </div>
          </div>
        </section>

        <section className="landing-section alt-surface">
          <div className="landing-container">
            <div className="section-header">
              <h2>Plans adaptes aux vendeurs</h2>
              <p>Un quota clair et un accompagnement selon la maturite de la boutique.</p>
            </div>
            <div className="pricing-grid">
              <div className="pricing-card fade-up">
                <h3>Starter</h3>
                <p className="price">29€ / mois</p>
                <p className="price-tag">50 produits</p>
                <ul>
                  <li>Boutique personnalisee</li>
                  <li>Commandes et messagerie</li>
                  <li>Support email</li>
                </ul>
                <Link className="btn-primary" to="/register">
                  Demarrer
                </Link>
              </div>
              <div className="pricing-card featured fade-up delay-1">
                <h3>Pro</h3>
                <p className="price">79€ / mois</p>
                <p className="price-tag">200 produits</p>
                <ul>
                  <li>Marketing &amp; coupons</li>
                  <li>Analytics avancees</li>
                  <li>Support prioritaire</li>
                </ul>
                <Link className="btn-primary" to="/register">
                  Passer Pro
                </Link>
              </div>
              <div className="pricing-card fade-up delay-2">
                <h3>Scale</h3>
                <p className="price">Sur devis</p>
                <p className="price-tag">Produits illimites</p>
                <ul>
                  <li>Multi-boutiques</li>
                  <li>API &amp; automatisations</li>
                  <li>Accompagnement dedie</li>
                </ul>
                <Link className="btn-ghost" to="/register">
                  Parler a l'equipe
                </Link>
              </div>
            </div>
          </div>
        </section>

        <section className="landing-cta">
          <div className="landing-container cta-content">
            <div>
              <h2>Pret a lancer votre marketplace ?</h2>
              <p>Construisez une experience complete pour vos vendeurs et vos clients.</p>
            </div>
            <div className="cta-actions">
              <Link className="btn-primary" to={primaryHref}>
                {primaryLabel}
              </Link>
              <Link className="btn-ghost" to="/login">
                Tester le back-office
              </Link>
            </div>
          </div>
        </section>
      </main>

      <footer className="landing-footer">
        <div className="landing-container footer-grid">
          <div>
            <p className="brand-mark">VINTSY</p>
            <p>Marketplace multi-boutiques pour vendeurs et marques ambitieuses.</p>
          </div>
          <div>
            <p className="footer-title">Produit</p>
            <Link to="/shops">Boutiques</Link>
            <Link to="/register">Plans</Link>
            <Link to="/dashboard">Back-office</Link>
          </div>
          <div>
            <p className="footer-title">Support</p>
            <a href="mailto:hello@vintsy.local">hello@vintsy.local</a>
            <span>Paris · Abidjan · Dakar</span>
          </div>
        </div>
        <div className="footer-bottom">
          <span>© 2026 VINTSY. Tous droits reserves.</span>
        </div>
      </footer>
    </div>
  );
}
