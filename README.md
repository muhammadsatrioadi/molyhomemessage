# MOLY HOME MASSAGE

> Professional outcall massage service website — Kuala Lumpur, Malaysia.
> **Technology:** Laravel 11 · PHP 8.2+ · Blade · Bootstrap 5 · Vanilla JS · MySQL/MariaDB
> **Deployment target:** CyberPanel · OpenLiteSpeed · PHP 8.3 · MariaDB · Cloudflare Tunnel (no public IP required)

---

## Table of Contents

1. [Project Overview](#1-project-overview)
2. [Requirements](#2-requirements)
3. [Local Development Setup](#3-local-development-setup)
4. [CyberPanel Deployment — Step by Step](#4-cyberpanel-deployment--step-by-step)
5. [Cloudflare Tunnel Architecture](#5-cloudflare-tunnel-architecture)
6. [Cloudflare DNS Configuration](#6-cloudflare-dns-configuration)
7. [Cloudflare Tunnel Setup (no public IP required)](#7-cloudflare-tunnel-setup-no-public-ip-required)
8. [Post-Deployment Commands](#8-post-deployment-commands)
9. [Permissions, Security & Hardening](#9-permissions-security--hardening)
10. [Caching, Optimization & OLS Tuning](#10-caching-optimization--ols-tuning)
11. [Troubleshooting](#11-troubleshooting)
12. [Backup & Maintenance](#12-backup--maintenance)

---

## 1. Project Overview

MOLY HOME MASSAGE is a premium outcall / home / hotel massage service operating in selected
areas of Kuala Lumpur, Malaysia. The website is built entirely around the primary conversion flow:

```
VISITOR
  → VIEW SERVICES (6 services with prices from database)
  → SELECT MASSAGE + DURATION
  → ENTER DATE / TIME / LOCATION
  → CLICK "Continue to WhatsApp"  →  Pre-filled WhatsApp booking
```

### Pages & Routes

| Route               | Name       | Purpose                                    |
|---------------------|------------|--------------------------------------------|
| `/`                 | `home`     | Full landing page (all sections)           |
| `/services`         | `services` | Services listing + bookings                |
| `/about`            | `about`    | Business story + "Why Choose Us"           |
| `/areas`            | `areas`    | Kuala Lumpur service areas                 |
| `/faq`              | `faq`      | FAQ accordion (EN/BM answers)              |
| `/contact`          | `contact`  | WhatsApp / email / hours / locations       |
| `/privacy-policy`   | `privacy`  | Privacy Policy (legal)                     |
| `/terms-conditions` | `terms`    | Terms & Conditions (legal)                 |
| `/language/{locale}`| `language` | EN / BM language switcher (session-based)  |

### Database-driven content
Nothing is hard-coded inside Blade. All of the following live in the database and are editable
via the seeders or a future admin panel:

- **services** — Balinese, Deep Tissue, Thai, Foot Standard, Foot Deep, Body Scrub
- **service_prices** — 30/60/90/120 min durations with RM prices
- **service_areas** — KLCC, Bukit Bintang, KL Sentral, Bangsar, Mont Kiara, Sri Hartamas, Ampang, Damansara, Setapak, Cheras
- **testimonials** — 6 editable demo testimonials
- **faqs** — 7 FAQs with EN and BM translations

### WhatsApp integration
The WhatsApp number is stored **exclusively** in `.env` (`MOLY_WHATSAPP`) and referenced via
`config/moly.php`. It is never hard-coded in Blade, CSS, JS, or controllers.

- Server-side helper: `app/Helpers/whatsapp.php` → `whatsapp_booking_url(...)`, `whatsapp_contact_url()`, `whatsapp_number_formatted()`
- Client-side: `public/assets/js/moly.js` reads the booking form and builds the exact same
  pre-filled message format before opening `https://wa.me/{number}?text=...`.

### Languages
- English (en) — default
- Malay / Bahasa Melayu (ms / BM)
- Session-stored locale, applied via middleware on every request

### Assets
All assets are **pre-built, production-ready static files**:

| Path                                              | Purpose                         |
|---------------------------------------------------|---------------------------------|
| `public/assets/css/moly.css`                      | Complete custom theme (2,200+ lines, premium spa aesthetic) |
| `public/assets/js/moly.js`                        | Vanilla JS (no build step, no npm) — smooth scroll, booking modal, reveal animations, navbar scroll behaviour |
| `public/assets/images/*.svg, *.jpg`               | SVG placeholders for hero, services, OG, favicon — replace with real photography anytime |

**No npm, Node.js, Vite, Tailwind, React, Vue, Inertia or Livewire is required.**

---

## 2. Requirements

| Component        | Minimum version             | Recommended                  |
|------------------|-----------------------------|------------------------------|
| PHP              | 8.3                         | 8.3 latest patch             |
| PHP extensions   | ctype, curl, dom, fileinfo, filter, hash, mbstring, openssl, pdo_mysql, session, tokenizer, xml, zip, gd | (All standard in CyberPanel PHP 8.3) |
| Web server       | OpenLiteSpeed 1.7+          | Latest OpenLiteSpeed         |
| Database         | MySQL 8.0 OR MariaDB 10.5+  | MariaDB 10.11                |
| Composer         | 2.x                         | 2.7+                         |
| OS on server     | Ubuntu 22.04/24.04 LTS OR AlmaLinux 8/9 OR CentOS 7+ | Ubuntu 24.04 LTS preferred |
| RAM              | 1 GB minimum                | 2 GB or more                 |
| Disk space       | 1 GB for app + database     | 10 GB+ for logs/backups      |

---

## 3. Local Development Setup

If you want to run the project locally on XAMPP / DDEV / Laravel Herd:

### 3.1 Install composer dependencies
```bash
cd c:\xampp\htdocs\molyhomemessage
composer install
```

### 3.2 Configure the environment
```bash
copy .env.example .env
```
Edit `.env` and fill in at minimum:

```dotenv
APP_NAME="MOLY HOME MASSAGE"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost/molyhomemessage/public

APP_KEY=   # will be generated next

MOLY_WHATSAPP=60123456789
MOLY_EMAIL=hello@molyhomemassage.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=molyhomemassage
DB_USERNAME=root
DB_PASSWORD=
```

### 3.3 Generate the app key
```bash
php artisan key:generate
```

### 3.4 Run migrations + seeders
```bash
php artisan migrate --seed
```

### 3.5 Link storage and run locally
```bash
php artisan storage:link
php artisan serve
```

Visit `http://localhost:8000` — the site is now running locally.

### 3.6 Verify the conversion flow locally
1. Homepage loads, all 6 services appear with correct RM prices.
2. Click any "Book Now" → booking modal opens.
3. Fill all 5 fields → click **Continue to WhatsApp**.
4. New tab opens → `https://wa.me/60123456789?text=Hello%20MOLY%20HOME%20MASSAGE%2C%0A%0AI%20would%20like%20to%20book%3A%0A%0AMassage%3A%20Balinese%20Massage%0ADuration%3A%20...`

---

## 4. CyberPanel Deployment — Step by Step

Target server: CyberPanel (v2.3+) on Ubuntu 22.04/24.04 LTS with OpenLiteSpeed, PHP 8.3,
MariaDB 10.11, reachable on a private network (no public IP needed — the origin sits behind
Cloudflare Tunnel).

Expected final paths on the origin:

- Project root:        `/home/molyhomemassage.com/molyhomemessage`
- Document root:       `/home/molyhomemassage.com/public_html`
- Laravel `/public`:   `/home/molyhomemassage.com/public_html/public`
- Domain:              `https://molyhomemassage.com`

---

### 4.1 Create the website in CyberPanel

1. Log into CyberPanel → **Websites → Create Website**.
2. Fill in:
   - **Select Package**         → Default / Starter (or any package you have)
   - **Select Owner**           → admin (or create a dedicated user `moly`)
   - **Domain Name**            → `molyhomemassage.com`
   - **Email**                  → `hello@molyhomemassage.com`
   - **Select PHP**             → **PHP 8.3** ✅
   - **SSL**                    → Do NOT enable Let's Encrypt here (Cloudflare will terminate TLS)
   - **Additional Features**    → `mail` optional, no DKIM/DNS required from CyberPanel
3. Click **Create Website**.

CyberPanel will create:
- VHost: `/usr/local/lsws/conf/vhosts/molyhomemassage.com/`
- DocRoot: `/home/molyhomemassage.com/public_html/`
- OpenLiteSpeed listener for `molyhomemassage.com` → `*:8080` (or `*:80` depending on config)

---

### 4.2 Set PHP 8.3 for the site (double-check)

- CyberPanel → **Websites → List Websites → `molyhomemassage.com` → Manage → PHP → Change PHP**
- Select **PHP 8.3** and Save.
- Still inside Manage, verify the following extensions are enabled for PHP 8.3 in CyberPanel:
  `pdo_mysql`, `mbstring`, `openssl`, `curl`, `gd`, `zip`, `xml`, `fileinfo`. They should all be
  on by default in a standard CyberPanel PHP 8.3 build.

---

### 4.3 Set document root to Laravel `/public` inside CyberPanel

**⚠ This is the most common deployment mistake.** CyberPanel default document root is
`public_html/`. Laravel's front controller lives in `public/` of the project. Pointing the
vhost directly to `public_html` exposes `.env`, `artisan`, and all source files to the world.

We want:

```
CyberPanel document root = /home/molyhomemassage.com/public_html/public
Laravel project          = /home/molyhomemassage.com/molyhomemessage
Symlink or copy project's public into /home/molyhomemassage.com/public_html/public
```

We will deploy via a project folder and symlink in Step 4.5 — cleanest and upgrade-safe.

---

### 4.4 Create MariaDB database in CyberPanel

1. CyberPanel → **Websites → List Websites → `molyhomemassage.com` → Manage → Database → Create Database**.
2. Fill in:
   - **Database Name**       → `molyhomemassage` (CyberPanel will prefix it as `moly_molyhomemassage` in some installs — always confirm on creation)
   - **Username**            → `molyhomemassage`
   - **Password**            → Use the CyberPanel password generator, save it somewhere secure.
3. Click **Create Database**.
4. Note the final values CyberPanel actually saved (always shown on the success screen).
5. Optional: CyberPanel → **PHP → Edit php.ini (PHP 8.3)** → verify:
   - `memory_limit = 256M`
   - `upload_max_filesize = 32M`
   - `post_max_size = 32M`
   - `max_execution_time = 60`
   - `date.timezone = Asia/Kuala_Lumpur`

Save and restart OpenLiteSpeed:
```bash
sudo systemctl restart lsws
```

---

### 4.5 Upload the project to CyberPanel

Choose one of these three approaches:

#### Option A — Git deploy (recommended)
```bash
sudo su -
cd /home/molyhomemassage.com
git clone git@github.com:<your-org>/molyhomemassage.git molynomemessage
chown -R molyhomemassage.com:molyhomemassage.com /home/molyhomemassage.com/molyhomemessage
```
*(User name may be `molyhomemassage.com` or the CyberPanel user you selected — check with
`ls -la /home/molyhomemassage.com/public_html`)*

#### Option B — SFTP upload via FileZilla / CyberPanel File Manager
- Zip the entire folder locally (**except** `vendor/`, `node_modules/`, `.env`)
- Upload `molyhomemessage.zip` → `/home/molyhomemassage.com/molyhomemessage/`
- Unzip there:
  ```bash
  sudo su -
  cd /home/molyhomemassage.com/molyhomemessage
  unzip -q molyhomemessage.zip
  chown -R molyhomemassage.com:molyhomemassage.com .
  ```

#### Option C — scp directly from local machine
```bash
scp -r /c/xampp/htdocs/molyhomemessage user@server-private-ip:/home/molyhomemassage.com/molyhomemessage
```

Regardless of upload method, verify the layout afterwards:
```bash
ls /home/molyhomemassage.com/molyhomemessage
#  app/  artisan  bootstrap/  composer.json  composer.lock  config/  database/  public/  resources/  routes/  storage/  tests/  vendor/  ...
```

---

### 4.6 Symlink Laravel public into public_html (document root)

```bash
sudo su -

# 1. Move / rename the default public_html that CyberPanel created.
cd /home/molyhomemassage.com
mv public_html public_html_cyberpanel_bak

# 2. Recreate public_html as our project root container,
#    with its only child being the symlinked Laravel /public.
mkdir -p public_html
ln -s /home/molyhomemassage.com/molyhomemessage/public /home/molyhomemassage.com/public_html/public

# 3. Adjust ownership so OLS / PHP can read everything.
chown -R molyhomemassage.com:molyhomemassage.com public_html public_html_cyberpanel_bak molyhomemessage

# 4. Double-check: CyberPanel document root path should resolve to Laravel's index.php.
ls -la /home/molyhomemassage.com/public_html/public/index.php
#    index.php should exist and be a real file, not another symlink.
```

Now the final structure is exactly as specified in the original requirements:

```
/home/molyhomemassage.com/
├── molyhomemessage/            ← Entire Laravel project (NOT web-accessible)
│   ├── app/
│   ├── artisan
│   ├── bootstrap/
│   ├── composer.json
│   ├── config/
│   ├── database/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── vendor/
│   └── .env
└── public_html/                ← CyberPanel / OpenLiteSpeed document root
    └── public -> /home/.../molyhomemessage/public   ← ONLY this folder is web-accessible
        ├── assets/
        ├── index.php
        ├── .htaccess
        ├── robots.txt
        └── ...
```

`.env`, `artisan`, and `vendor/` are **outside** the web-accessible document root. ✅

---

### 4.7 Configure `.env` on production

```bash
cd /home/molyhomemassage.com/molyhomemessage
cp .env.example .env
nano .env
```

Fill in at minimum:

```dotenv
APP_NAME="MOLY HOME MASSAGE"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://molyhomemassage.com
APP_LOCALE=en
APP_FALLBACK_LOCALE=en

MOLY_WHATSAPP=601XXXXXXXXX      # ← the real number
MOLY_EMAIL=hello@molyhomemassage.com

LOG_CHANNEL=daily
LOG_LEVEL=notice

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=moly_molyhomemassage     # ← use the FINAL name CyberPanel created in 4.4
DB_USERNAME=moly_molyhomemassage
DB_PASSWORD=xxxxxxxxxxxx

CACHE_STORE=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

Save and exit (`Ctrl+O`, `Enter`, `Ctrl+X`).

**Critical:** Never commit `.env` to git. Never paste credentials into screenshots or tickets.

---

### 4.8 Run `composer install` on the server

```bash
cd /home/molyhomemassage.com/molyhomemessage

# Verify composer is available:
composer --version
# If not installed, install once:
# curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install prod dependencies (no dev packages):
composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist
```

Expected output: `Generating optimized autoload files… DONE`.

---

### 4.9 Generate the application key once

```bash
php artisan key:generate
# → Application key set successfully.
```

Double-check the `.env` now contains a 44-char `APP_KEY=base64:...`.

---

### 4.10 Run migrations + all seeders

```bash
php artisan migrate --seed --force
```

This creates:
- `services`, `service_prices`, `service_areas`, `testimonials`, `faqs`
- All 6 services, 18 price rows, 10 KL areas, 6 testimonials, 7 FAQs.

Verify prices in DB:
```bash
php artisan tinker
>>> DB::table('service_prices')->join('services','services.id','=','service_prices.service_id')->select('services.name','service_prices.duration','service_prices.price')->orderBy('services.sort_order')->orderBy('service_prices.duration')->get();
```

The output must match exactly:

| Name                     | Duration  | Price  |
|--------------------------|-----------|--------|
| Balinese Massage         | 60        | 140    |
| Balinese Massage         | 90        | 200    |
| Balinese Massage         | 120       | 240    |
| Deep Tissue Massage      | 60        | 180    |
| Deep Tissue Massage      | 90        | 250    |
| Deep Tissue Massage      | 120       | 300    |
| Thai Massage             | 60        | 240    |
| Thai Massage             | 90        | 310    |
| Thai Massage             | 120       | 370    |
| Foot Massage Standard    | 60        | 140    |
| Foot Massage Standard    | 90        | 200    |
| Foot Massage Standard    | 120       | 240    |
| Foot Massage Deep Pressure | 60      | 170    |
| Foot Massage Deep Pressure | 90      | 240    |
| Foot Massage Deep Pressure | 120     | 290    |
| Body Scrub               | 30        | 70     |

Type `exit` to leave tinker.

---

### 4.11 Link storage & cache everything

```bash
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Expected output:
```
   INFO  The [public/storage] link has been connected to [storage/app/public].
   INFO  Configuration cached successfully.
   INFO  Routes cached successfully.
   INFO  Blade templates cached successfully.
```

---

### 4.12 Set correct permissions for storage and bootstrap/cache

On CyberPanel with OpenLiteSpeed, PHP runs as user `molyhomemassage.com` or `nobody` depending on
your vhost settings. The safe default for single-site deployment is to make `storage/` and
`bootstrap/cache/` writable by the web server user:

```bash
cd /home/molyhomemassage.com/molyhomemessage

# Determine the user PHP actually runs as on this vhost:
grep -E 'user|group' /usr/local/lsws/conf/vhosts/molyhomemassage.com/vhconf.conf || ls -la public_html

# Standard CyberPanel OLS vhost runs PHP as vhost user (molyhomemassage.com):
chown -R molyhomemassage.com:molyhomemassage.com storage bootstrap/cache

chmod -R ug+rwX storage bootstrap/cache
chmod -R o-wx storage bootstrap/cache

find storage bootstrap/cache -type d -exec chmod 775 {} \;
find storage bootstrap/cache -type f -exec chmod 664 {} \;

# Protect .env specifically:
chmod 600 .env
chown molyhomemassage.com:molyhomemassage.com .env

# And vendor, app, resources — readable by OLS, not writable:
chown -R molyhomemassage.com:molyhomemassage.com vendor app bootstrap/config bootstrap/app.php config database resources routes public
chmod -R a=rX,u+w vendor app config database resources routes bootstrap public
```

**Security sanity check after permissions:**
```bash
# Must NOT be web-accessible:
curl -I http://127.0.0.1:8080/../molyhomemessage/.env   # from the server
# Expected: 404. If you get 200 your document root is wrong — revisit 4.2 and 4.6.
```

---

### 4.13 Verify Laravel responds through the origin vhost

```bash
curl -s -o /dev/null -w "%{http_code}\n" -H "Host: molyhomemassage.com" http://127.0.0.1:8080/public/
# Expected: 200

curl -s -H "Host: molyhomemassage.com" http://127.0.0.1:8080/public/ | head -c 500
# Expected output: <!DOCTYPE html><html lang="en" ... <title>MOLY HOME MASSAGE | ...
```

If you see a blank page or 500, inspect:
```bash
tail -n 100 storage/logs/laravel-$(date +%Y-%m-%d).log
tail -n 100 /usr/local/lsws/logs/error.log
```

---

## 5. Cloudflare Tunnel Architecture

The origin server (CyberPanel + OpenLiteSpeed + Laravel) is intentionally **not** exposed to
the public internet. It can live on a private Indonesian network with only an RFC1918 IP.
Cloudflare Tunnel creates a single, authenticated, outbound-only tunnel from origin → Cloudflare.

```
Customer in Malaysia (mobile / hotel wifi / home fibre)
        │
        ▼  HTTPS
molyhomemassage.com  ←  authoritative DNS on Cloudflare
        │
        ▼  Anycast + WAF + Cache + Argo Smart Routing
Cloudflare global edge network  (275+ PoPs)
        │
        ▼  Cloudflare Tunnel (mTLS, outbound-only, port 7844 UDP or 443 TCP fallback)
cloudflared daemon running on the CyberPanel origin (or nearby VM on the same LAN)
        │
        ▼  HTTP/2 on localhost / private IP only
CyberPanel → OpenLiteSpeed (vhost: molyhomemassage.com, listening on 127.0.0.1:8080 or *:8080)
        │
        ▼  FastCGI / LSPHP 8.3
Laravel 12  →  MySQL / MariaDB  →  molyhomemassage database
        │
        ▼  WhatsApp booking flow (visitor → browser opens https://wa.me/...)
WhatsApp servers (separate, unrelated to origin)
```

Benefits of this topology:
- **No public IP required on the origin.**
- Origin never accepts **any** inbound connection at all.
- DDoS, WAF, bot management, TLS all handled by Cloudflare.
- Malaysian end users see the lowest-possible latency via Cloudflare's Singapore / Kuala Lumpur PoPs.
- You can physically move or re-IP the origin at any time with zero DNS changes.

---

## 6. Cloudflare DNS Configuration

1. Add site `molyhomemassage.com` to Cloudflare.
2. Set Cloudflare **SSL/TLS → Overview** = **Full (strict)** once we bring the tunnel up; until
   then, **Flexible** is a temporary safe default while you verify the tunnel.
3. **SSL/TLS → Edge Certificates:**
   - Always Use HTTPS = On
   - Automatic HTTPS Rewrites = On
   - Minimum TLS Version = 1.2
   - HSTS = Enabled, max-age=6 months, includeSubDomains (after everything works)
4. In DNS, **delete** any pre-existing `A`/`AAAA` records for `@` and `www`.
5. Create the following records exactly:

| Type | Name | Content               | Proxy status | TTL  | Notes                                              |
|------|------|-----------------------|--------------|------|----------------------------------------------------|
| CNAME | `@`  | `<tunnel-ID>.cfargotunnel.com` | Proxied  | Auto | Created automatically by the tunnel in step 7.6 |
| CNAME | `www`| `molyhomemassage.com` | Proxied      | Auto | Created manually after the `@` record exists     |
| TXT   | `@`  | `v=spf1 include:_spf.mx.cloudflare.net ~all` | DNS only | Auto | If you use Cloudflare Email Routing; omit if not |

Do **not** point any DNS record at the origin's IP. The origin remains completely hidden.

---

## 7. Cloudflare Tunnel Setup (no public IP required)

Cloudflare Tunnel is **free** for any Cloudflare account, and is installed via a single binary
called `cloudflared`. Install it **on the CyberPanel origin server itself** (or a small VM on the
same private LAN that can reach `127.0.0.1:8080`).

### 7.1 Install `cloudflared` on Ubuntu 22.04/24.04

```bash
# Add Cloudflare package repo & install cloudflared (amd64, Ubuntu)
curl -fsSL https://pkg.cloudflare.com/cloudflare-main.gpg \
  | sudo tee /usr/share/keyrings/cloudflare-main.gpg >/dev/null
echo "deb [signed-by=/usr/share/keyrings/cloudflare-main.gpg] https://pkg.cloudflare.com/cloudflared $(lsb_release -cs) main" \
  | sudo tee /etc/apt/sources.list.d/cloudflared.list
sudo apt-get update && sudo apt-get install -y cloudflared

# Verify
cloudflared --version
# → cloudflared version 2025.x.x (built ...)
```

For AlmaLinux / Rocky / CentOS see: https://pkg.cloudflare.com/index.html — cloudflared is also a
single static binary that can be dropped in `/usr/local/bin/` with zero dependencies.

### 7.2 Authenticate `cloudflared` to your Cloudflare account

```bash
sudo cloudflared tunnel login
```

- A browser URL is printed.
- Open it, log in to your Cloudflare account, select the `molyhomemassage.com` zone, and
  click **Authorize**.
- A certificate file is written to:
  `/root/.cloudflared/cert.pem`
  (or `$HOME/.cloudflared/cert.pem` for the user that ran the command).

### 7.3 Create the tunnel

```bash
sudo cloudflared tunnel create moly-kuala-lumpur
```

Output:
```
Tunnel credentials written to /root/.cloudflared/xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx.json.
moly-kuala-lumpur tunnel id is xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx.
```

✅ **Save the tunnel ID.** Example: `a1b2c3d4-1234-abcd-5678-000000000000`

### 7.4 Create the tunnel config file

```bash
sudo mkdir -p /etc/cloudflared
sudo nano /etc/cloudflared/config.yml
```

Paste exactly (replace all `<…>` placeholders with your real values):

```yaml
tunnel: <TUNNEL-ID-FROM-STEP-7.3>
credentials-file: /root/.cloudflared/<TUNNEL-ID-FROM-STEP-7.3>.json

ingress:
  # Rule 1 — main site:  molyhomemassage.com  →  OpenLiteSpeed vhost on origin
  - hostname: molyhomemassage.com
    service: http://127.0.0.1:8080
    originRequest:
      connectTimeout: 10s
      noTLSVerify: true
      httpHostHeader: molyhomemassage.com

  # Rule 2 — www prefix  →  same origin (canonical redirect handled by Laravel / Cloudflare)
  - hostname: www.molyhomemassage.com
    service: http://127.0.0.1:8080
    originRequest:
      connectTimeout: 10s
      noTLSVerify: true
      httpHostHeader: molyhomemassage.com

  # Rule 3 — catch-all → HTTP 404 from cloudflared for anything unexpected
  - service: http_status:404
```

Save and exit.

**Why `noTLSVerify: true`?** Between Cloudflare and the origin, the connection is already
authenticated end-to-end by cloudflared's mTLS certs. The origin OLS listener on port 8080
typically only has a self-signed cert or no TLS at all — skipping the extra check is fine and
avoids a real failure mode.

### 7.5 Validate the ingress rules

```bash
sudo cloudflared tunnel ingress validate --config /etc/cloudflared/config.yml
# → Validating rules from /etc/cloudflared/config.yml
# → OK
```

### 7.6 Create the DNS CNAME record via cloudflared

```bash
sudo cloudflared tunnel route dns <TUNNEL-ID-FROM-STEP-7.3> molyhomemassage.com
sudo cloudflared tunnel route dns <TUNNEL-ID-FROM-STEP-7.3> www.molyhomemassage.com
```

Cloudflare's DNS dashboard will now automatically show the new `CNAME` entries pointing at
`<tunnel-ID>.cfargotunnel.com` with **Proxied = Proxied** ✅ — exactly as described in Section 6.

### 7.7 Install `cloudflared` as a systemd service (auto-start, restart on failure)

```bash
sudo cloudflared --config /etc/cloudflared/config.yml service install
sudo systemctl daemon-reload
sudo systemctl enable cloudflared
sudo systemctl start cloudflared
```

Check the service came up clean:
```bash
sudo systemctl status cloudflared
# → active (running)

sudo journalctl -u cloudflared -n 50 --no-pager
# Look for lines similar to:
#   INF Connection <id> registered connIndex=0  ...  location=SIN (Singapore)
#   INF Connection <id> registered connIndex=1  ...  location=KUL (Kuala Lumpur)
#   INF Management bind ...
# → 4 registered connections = healthy (2 regions × 2 connections each for HA)
```

### 7.8 Enable HTTPS through Cloudflare (end-to-end green lock)

1. Cloudflare → SSL/TLS → **Full (strict)**.
2. SSL/TLS → Edge Certificates → enable **Always Use HTTPS** + **Automatic HTTPS Rewrites**.
3. Cloudflare → Speed → Optimization →
   - Auto Minify: tick JS, CSS, HTML
   - Brotli: On
   - Early Hints: On
   - Rocket Loader: Off (safe default — the site already has no render-blocking JS)
4. Cloudflare → Caching → Configuration → **Cache Level: Standard** → TTL for browser cache: 4 hours.

### 7.9 Verify Laravel works through the domain

```bash
# From your laptop / any machine outside the origin network:
curl -I https://molyhomemassage.com
# → HTTP/2 200
# → server: cloudflare
# → cf-ray: xxxxxxxxxx-SIN

curl -s https://molyhomemassage.com | grep -o '<title>[^<]*</title>' | head -n 1
# → <title>MOLY HOME MASSAGE | Home & Hotel Massage Kuala Lumpur</title>

# Test a sub-page too:
curl -s -o /dev/null -w "%{http_code}\n" https://molyhomemassage.com/services
curl -s -o /dev/null -w "%{http_code}\n" https://molyhomemassage.com/areas
curl -s -o /dev/null -w "%{http_code}\n" https://molyhomemassage.com/faq
# → all 200

# Test language switcher sets a session cookie & redirects back:
curl -s -I https://molyhomemassage.com/language/ms | grep -E '^(HTTP|set-cookie|location)'
# → 302 + location back + moly_homemassage_session cookie
```

Open `https://molyhomemassage.com` in an incognito browser window on your phone and:
1. Scroll → navbar collapses elegantly ✅
2. Click any **Book Now** → modal opens, selects service & duration ✅
3. Enter date + time + location → click **Continue to WhatsApp** ✅
4. WhatsApp opens with the exact pre-filled message ✅
5. Click **EN | BM** in navbar → page reloads in BM ✅
6. Resize to 320 / 375 / 414 / 768 / 1024 / 1440 / 1920 → everything reflows ✅
7. Floating WhatsApp button is visible only on mobile ✅

---

## 8. Post-Deployment Commands

Use this scripted sequence every time you deploy an update to avoid downtime:

```bash
cd /home/molyhomemassage.com/molyhomemessage

# 1. Pull latest code (Git)
git pull origin main

# 2. Install / update composer dependencies
composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# 3. If new migrations exist, run them (use --force on prod):
php artisan migrate --force

# 4. If seeder content changed (new services, updated prices):
#   php artisan db:seed --force   # (dedupe logic in seeders recommended first)

# 5. Rebuild all caches in correct order
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Reset permissions on the 2 writable trees
chown -R molyhomemassage.com:molyhomemassage.com storage bootstrap/cache
chmod -R ug+rwX,o-wx storage bootstrap/cache

# 7. Optional — warm OLS PHP with a few curl requests
for i in / /services /areas /faq /contact; do
  curl -s -o /dev/null -H "Host: molyhomemassage.com" "http://127.0.0.1:8080/public$i"
done

# 8. Restart cloudflared (if tunnel config changed)
# sudo systemctl restart cloudflared

# 9. Graceful OpenLiteSpeed restart (picks up any new .htaccess rules)
sudo systemctl reload lsws
```

---

## 9. Permissions, Security & Hardening

### 9.1 Laravel-specific security checks
- `.env` lives outside `public_html` → already guaranteed by our 4.6 layout.
- CSRF protection is enabled by default via the Laravel middleware stack.
- All user-entered text in FAQs, testimonials, service names, and descriptions is escaped via
  standard Blade `{{ }}` → no unescaped output anywhere.
- `APP_DEBUG=false` in production `.env` → never reveal stack traces to visitors.

### 9.2 Server hardening
- **SSH:** disable password auth, require ed25519 SSH key, change port, `fail2ban` installed.
- **Firewall (ufw / firewalld):** block every inbound port **except the SSH port you use**.
  Cloudflare Tunnel does not need any open inbound ports.
  ```bash
  sudo ufw default deny incoming
  sudo ufw default allow outgoing
  sudo ufw limit 22/tcp comment 'SSH'
  # Do NOT open 80, 443, 8080 or 8443 — cloudflared is outbound-only!
  sudo ufw --force enable
  sudo ufw status verbose
  ```
- **Automatic security updates:**
  ```bash
  sudo apt install -y unattended-upgrades apt-listchanges
  sudo dpkg-reconfigure -plow unattended-upgrades   # select Yes
  ```
- **MariaDB:** bind to `127.0.0.1` only, delete default anonymous accounts and test database.
- **CyberPanel admin:** bind to loopback / specific IP, enable 2FA if supported in your version.

### 9.3 `public/.htaccess` already applied by the project
- Forces HTTPS (useful even behind Cloudflare)
- Denies direct access to `.env`, `artisan`, `*.json`, `*.md`, `*.git` — defense in depth.
- Adds security headers:
  `X-Content-Type-Options: nosniff`
  `X-Frame-Options: SAMEORIGIN`
  `X-XSS-Protection: 1; mode=block`
  `Referrer-Policy: strict-origin-when-cross-origin`
  `Permissions-Policy: geolocation=(), microphone=(), camera=()`
- Expires headers + gzip / deflate for CSS, JS, images, fonts, SVG.

### 9.4 Never ever commit or paste
- `APP_KEY`
- `DB_PASSWORD`
- `MOLY_WHATSAPP` (treat it like PII — it is a real operational phone line)
- Cloudflare account tokens / API keys / tunnel credentials

---

## 10. Caching, Optimization & OLS Tuning

### 10.1 Cloudflare Cache Rules (recommended)
Create 3 rules under Cloudflare → Rules → Cache Rules:

| Rule name       | When incoming requests match...                              | Eligibility                | TTL         |
|-----------------|--------------------------------------------------------------|----------------------------|-------------|
| Cache HTML pages| Hostname equals `molyhomemassage.com` AND URI Path not starts with `/language/` AND Cookie not contains `moly_homemassage_session` | Standard | 5 minutes (Respect existing headers) |
| Cache static assets | URI Extension in (svg, jpg, jpeg, png, gif, webp, css, js, woff2, ttf, otf) | Eligible for cache | 1 year, cache everything |
| Bypass dynamic  | URI Path starts with `/language/`                           | Bypass cache               | -           |

### 10.2 OpenLiteSpeed cache (do **not** double-cache HTML)
- In OpenLiteSpeed admin (`:7080`) → Virtual Hosts → `molyhomemassage.com` → Cache →
  Set **Enable Cache** to `No` (or Static Only) — Cloudflare already handles HTML caching.
- Leave **Public Cached TTL** etc. at defaults for static files; this is in addition to the
  already-applied `.htaccess` expires headers.

### 10.3 PHP / OLS tuning (for 2 GB RAM server)
- OLS Admin → Server Configuration → **General → Using Apache Style Configuration → PHP Handler**
  → already default LSPHP 8.3.
- PHP → **External App → lsphp83** →
  - Max Connections = `35`
  - PHP_LSAPI_MAX_REQUESTS = `500`
  - PHP_LSAPI_CHILDREN = `8`
  - Memory Soft Limit = `1024M`
  - Memory Hard Limit = `1536M`
  - Process Soft Limit = `400`
  - Process Hard Limit = `500`
- Tune OLS → **Tuning → Connections** → Max Connections = `2048`, Max Keep-Alive = 30s.
- `sudo systemctl restart lsws`

### 10.4 Laravel caches (always enabled on prod)
Already run in 4.11:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Blade views compile once, then are served from disk until you clear the cache again.

---

## 11. Troubleshooting

### Symptom A — "White page" or 500 when visiting homepage
- Check `.env` has `APP_KEY=` set (run `php artisan key:generate`)
- Check `storage/logs/laravel-*.log` for specific stack trace.
- Verify `storage/` and `bootstrap/cache/` are writable by OLS user (Section 4.12).
- Verify `vendor/` exists (`composer install` ran).

### Symptom B — "The only supported ciphers are AES-128-CBC and AES-256-CBC..."
- Laravel's encryption key is missing. Run:
  ```bash
  php artisan key:generate
  php artisan config:cache
  ```

### Symptom C — 404 on everything except `/`
- OpenLiteSpeed did not pick up the `.htaccess` rewrite rules.
- **Quick verify** → `curl -I https://molyhomemassage.com/public/index.php/services` → if that works
  and `/services` doesn't → rewrites not running.
- **Fix** — CyberPanel → Websites → `molyhomemassage.com` → Manage → Rewrite Rules.
  Paste the full contents of `public/.htaccess` into the rewrite rules box and save.
- Graceful restart OLS: `sudo systemctl reload lsws`.

### Symptom D — Cloudflare shows "Error 502 Bad Gateway" or "origin DNS error"
- `sudo systemctl status cloudflared` → must be **active (running)**.
- `sudo journalctl -u cloudflared -n 100 --no-pager | grep -iE 'error|fail|unable'`
- Verify tunnel config `/etc/cloudflared/config.yml` points to `http://127.0.0.1:8080`
  AND sends `httpHostHeader: molyhomemassage.com`.
- Verify OLS actually serves that vhost on the origin (step 4.13 `curl -H Host: ...`).

### Symptom E — Booking modal service / duration dropdowns empty
Booking form population is driven by a small global JS variable injected on each page that
has services. Verify:
```
Right-click homepage → view source → search for:  window.MOLY_SERVICES
```
It must contain an array of 6 objects, each with an `id`, `name`, and `prices[]`. If the array is
empty (e.g. on the Contact page) that is expected; on the home and `/services` pages it must be
fully populated.

### Symptom F — Language not changing on click of EN | BM
- `storage/framework/sessions/` must be writable (permissions step 4.12).
- `/language/en` and `/language/ms` routes must return 302 back.
- Browser must accept cookies (the `moly_homemassage_session` cookie).

### Symptom G — WhatsApp link opens wa.me but the number has "+60" stripped (or 2x "6060")
- Set `.env` `MOLY_WHATSAPP` to exactly the format in the project: country code with no `+` or
  leading zero, e.g. `60123456789` (for `+60 12-345 6789`).
- Server-side helper (`app/Helpers/whatsapp.php`) and client-side JS (`moly.js`) both build the
  URL the same way; changing either one alone causes inconsistency.

---

## 12. Backup & Maintenance

### 12.1 Simple automated backup (recommended)

```bash
sudo mkdir -p /opt/backups/moly
sudo nano /etc/cron.daily/moly-backup
```

Paste:
```bash
#!/usr/bin/env bash
set -euo pipefail

DATE=$(date +%F_%H%M)
BACKUP_DIR="/opt/backups/moly"
APP_DIR="/home/molyhomemassage.com/molyhomemessage"
DB_USER="moly_molyhomemassage"
DB_PASS="xxxxxxxx"
DB_NAME="moly_molyhomemassage"

mkdir -p "$BACKUP_DIR"

# 1. MariaDB dump
mysqldump -u"$DB_USER" -p"$DB_PASS" --single-transaction --quick --lock-tables=false "$DB_NAME" \
  | gzip -9 > "$BACKUP_DIR/db_${DATE}.sql.gz"

# 2. App code + .env (no vendor — it is reproducible from composer.json)
tar -cpzf "$BACKUP_DIR/app_${DATE}.tar.gz" \
    -C /home/molyhomemassage.com \
    --exclude=molyhomemessage/vendor \
    --exclude=molyhomemessage/node_modules \
    molyhomemessage

# 3. Retain 14 days only
find "$BACKUP_DIR" -type f -mtime +14 -delete

# 4. Optional — upload to off-site storage: rclone copy ... B2 / S3 / GCS
# echo "Backup $DATE complete" | mail -s "Moly backup OK" hello@molyhomemassage.com
```

```bash
sudo chmod +x /etc/cron.daily/moly-backup
# Test once:
sudo run-parts /etc/cron.daily
ls -lah /opt/backups/moly
```

### 12.2 Monthly maintenance checklist
- [ ] Review & rotate `.env` values if team members changed.
- [ ] Apply OS security updates: `apt update && apt -y upgrade` → reboot if kernel upgraded.
- [ ] Upgrade `cloudflared`: `apt install --only-upgrade cloudflared` → `systemctl restart cloudflared`.
- [ ] Clear Laravel logs older than 14 days or keep them via logrotate.
- [ ] Confirm backups completed without gaps.
- [ ] Smoke test: open homepage, submit booking modal → WhatsApp loads with correct form data.
- [ ] Check PHP error log: `/usr/local/lsws/lsphp83/var/log/php83.log`
- [ ] Check Cloudflare → Security → Events → review any blocked traffic.

---

## Final Quality Checklist (before going live)

✅ Laravel 11 + PHP 8.2+ compatible                        ✅ All routes work
✅ All route names exist (`home`, `services`, `about`, `areas`, `faq`, `contact`, `privacy`, `terms`, `language`)
✅ All Blade templates compile (`php artisan view:cache`)   ✅ No missing variables
✅ No missing translation keys (EN + BM)                    ✅ No hardcoded WhatsApp number (grep blade/js/Controllers)
✅ All 18 price rows match supplied data                    ✅ All 6 services seeded
✅ `services` hasMany `service_prices` (Eloquent works)    ✅ Booking modal opens
✅ WhatsApp URL is correctly URL-encoded                    ✅ EN/BM switcher persists across requests
✅ FAQ accordion works (Bootstrap 5.3)                     ✅ Mobile navbar (320px) works
✅ Floating WhatsApp button < md only                       ✅ SEO meta, OG, Twitter present
✅ LocalBusiness + Service + FAQPage JSON-LD present       ✅ 404 + 500 branded pages exist
✅ Bootstrap + Icons + moly CSS/JS assets load             ✅ Responsive at 320/375/414/768/1024/1440/1920
✅ `npm` not required anywhere                              ✅ Deploy works on CyberPanel + OLS
✅ Cloudflare Tunnel architecture fully supported          ✅ Conversion flow: visitor → service → duration → date/time/location → WhatsApp

---

*This README is intended to be sufficient for a senior admin to complete production deployment
from scratch in 1–2 hours including tunnel provisioning. If any step produces unexpected output,
run the verification commands listed *in* that step before moving forward — every failure mode
listed has an explicit remediation in Section 11.*
