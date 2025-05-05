# 0) Arrêter et supprimer les conteneurs + volumes
Write-Host "docker compose down -v"
docker compose down -v

# 1) Copier .env.example vers .env si .env n'existe pas
if (-Not (Test-Path ".env")) {
  Write-Host "Copie de .env.example vers .env"
  Copy-Item ".env.example" ".env"
}
else {
  Write-Host ".env déjà présent, aucune copie nécessaire"
}

# 2) Démarrer les conteneurs en arrière-plan
Write-Host "docker compose up -d"
docker compose up -d

# 3) Ajouter la fonction lara au profil PowerShell (si elle n'y est pas déjà)
$laraFunction = @'
function lara {
  $c = docker ps --filter "ancestor=sail-8.4/app" --format "{{.Names}}" | Select-Object -First 1
  if (-not $c) {
    Write-Error "Aucun conteneur sail-8.4/app trouvé"
  } else {
    docker exec -it $c @args
  }
}
'@

$profileContent = Get-Content $PROFILE -Raw -ErrorAction SilentlyContinue
if ($profileContent -notmatch "function lara") {
  Write-Host "Ajout de la fonction 'lara' à ton profil PowerShell"
  $laraFunction | Add-Content -Path $PROFILE
  . $PROFILE
}
else {
  Write-Host "La fonction 'lara' existe déjà dans ton profil"
}

# 4 à 8) Commandes Laravel dans le conteneur
Write-Host "lara composer install"
lara composer install

Write-Host "lara php artisan key:generate"
lara php artisan key:generate

Write-Host "lara npm install"
lara npm install

Write-Host "lara npm run build"
lara npm run build

Write-Host "lara php artisan migrate"
lara php artisan migrate
