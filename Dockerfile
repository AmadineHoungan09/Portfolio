# Utiliser une image PHP officielle
FROM php:8.1-cli

# Copier les fichiers du projet dans le conteneur
COPY . /app
WORKDIR /app

# Exposer le port sur lequel l'application écoute
EXPOSE 10000

# Lancer le serveur PHP
CMD ["php", "-S", "0.0.0.0:10000"]
