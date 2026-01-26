# Mass Snow Closings ❄️

**The most wicked pissah way to check school closings in Massachusetts.**

🌐 **Live Site:** [massclosings.boston](https://massclosings.boston/)

## What is this?

Remember that [Jimmy Fallon bit](https://www.youtube.com/results?search_query=jimmy+fallon+boston+accent+town+names) where Matt Damon, Ben Affleck, and Jimmy Fallon pronounce every town name in Massachusetts with thick Boston accents?

This site takes that comedy gold and turns it into a functional (and hilarious) snow day closing tracker. When schools close during a Nor'eastah, you can watch celebrities butcher the pronunciation of your town instead of reading boring text lists.

## How it works

1. Scrapes real-time school/business closings from [WCVB](https://www.wcvb.com/weather/closings)
2. Matches closings to Massachusetts municipalities
3. Plays the corresponding video clip for each closed town
4. Loops through all active closings with that authentic Boston charm

## Tech Stack

- **Laravel 12** - PHP 8.2+ framework
- **SQLite** - Simple database for towns and closures
- **Vanilla JS** - No framework needed, kehd
- **WCVB** - Data source for closings

## Local Development

```bash
# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Run migrations and seed towns
php artisan migrate
php artisan db:seed

# Sync closings from WCVB
php artisan closings:sync

# Start the server
php artisan serve
```

Visit `http://localhost:8000` and click to start.

## Video Files

Videos go in `public/videos/` with the naming convention `{town-slug}.mp4`:
- `boston.mp4`
- `worcester.mp4`
- `west-bridgewater.mp4`

All 351 Massachusetts municipalities are supported.

## Scheduled Sync

The scraper runs every 5 minutes via Laravel's scheduler:

```bash
# Add to crontab
* * * * * cd /path-to-project && php artisan schedule:run >> /dev/null 2>&1
```

## Disclaimer

This site is for entertainment and informational purposes only. Always verify closings with official sources. We're not responsible if you show up to school because you were too busy laughing at Ben Affleck saying "Gloucester."

## License

MIT - Do whatever you want with it.

---

*Built during a snow day, obviously.* 🌨️