# Mass Snow Closings - Implementation Plan

## Project Overview
A Laravel application that monitors WCVB's snow closings page, extracts Massachusetts town/city closures, and displays them as a seamless video loop on the homepage.

---

## Architecture

### Components
1. **Web Scraper Service** - Fetches and parses WCVB closings page
2. **Town Filter** - Validates entries against MA municipalities list
3. **Closure Database** - Stores active closures with timestamps
4. **Scheduled Task** - Runs scraper every 5 minutes
5. **Frontend Player** - JavaScript video player for seamless looping

### Data Flow
```
WCVB Page → Scraper → Town Filter → Database → API → Frontend Video Player
```

---

## Phase 1: Laravel Setup

### Tasks
- [x] Install fresh Laravel 11 application
- [x] Configure SQLite database (simple, no external dependencies)
- [x] Set up environment configuration

### Files Created
- Standard Laravel directory structure
- `.env` configuration

---

## Phase 2: Massachusetts Towns Data

### Tasks
- [x] Create migration for `towns` table
- [x] Create migration for `closures` table
- [x] Create seeder with all 351 MA municipalities
- [x] Create Town model
- [x] Create Closure model with relationships

### Database Schema

**towns table:**
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| name | string | Town name (e.g., "Holliston") |
| slug | string | URL-safe name (e.g., "holliston") |
| has_video | boolean | Whether video file exists |
| created_at | timestamp | |
| updated_at | timestamp | |

**closures table:**
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| town_id | bigint | Foreign key to towns |
| source_text | string | Original text from WCVB |
| detected_at | timestamp | When closure was first detected |
| last_seen_at | timestamp | Last time seen on WCVB |
| is_active | boolean | Currently active closure |
| created_at | timestamp | |
| updated_at | timestamp | |

---

## Phase 3: Web Scraper Service

### Tasks
- [x] Create `ClosingScraperService` class
- [x] Implement HTTP client to fetch WCVB page
- [x] Parse HTML to extract closing entries
- [x] Filter entries to match only town/city names
- [x] Handle connection errors gracefully

### Scraper Logic
1. Fetch https://www.wcvb.com/weather/closings
2. Parse HTML for closing entries
3. For each entry:
   - Normalize text (lowercase, trim)
   - Check if it matches a known MA town
   - If match: create/update closure record
4. Mark closures not seen in latest scrape as inactive

### Files Created
- `app/Services/ClosingScraperService.php`

---

## Phase 4: Scheduled Task

### Tasks
- [x] Create Artisan command `closings:sync`
- [x] Register command in scheduler (every 5 minutes)
- [x] Add logging for debugging
- [x] Handle overlapping job prevention

### Files Created
- `app/Console/Commands/SyncClosingsCommand.php`
- Update `routes/console.php` for scheduler

---

## Phase 5: API Endpoint

### Tasks
- [x] Create API route for active closures
- [x] Return list of active town slugs for video playback
- [x] Add caching to reduce database queries

### API Response Format
```json
{
  "closures": ["holliston", "medway", "millis"],
  "updated_at": "2024-01-23T15:30:00Z",
  "count": 3
}
```

### Files Created
- `app/Http/Controllers/ClosureController.php`
- Update `routes/api.php`

---

## Phase 6: Frontend Video Player

### Tasks
- [x] Create homepage view with video player
- [x] Implement JavaScript for seamless video queue
- [x] Poll API every 30 seconds for updates
- [x] Handle empty state (no closures)
- [x] Preload next video for seamless transitions

### Video Player Features
- Fetches active closures from API
- Builds video queue from town slugs
- Plays videos in sequence, looping indefinitely
- Preloads next video while current plays
- Updates queue when API data changes
- **Empty State**: Shows "No closures currently reported" message (simple text)

### Files Created
- `resources/views/welcome.blade.php` (modify)
- `resources/js/video-player.js`
- `public/videos/` directory for .mp4 files

---

## Phase 7: Video Assets

### Tasks
- [x] Create `public/videos/` directory structure
- [x] Document video naming convention
- [ ] Create placeholder/test videos if needed

### Video Naming Convention (Confirmed)
- All lowercase
- Spaces replaced with **hyphens**
- Format: `{town-slug}.mp4`
- Examples: `holliston.mp4`, `west-bridgewater.mp4`, `north-andover.mp4`

---

## Phase 8: Testing & Polish

### Tasks
- [ ] Test scraper with live WCVB page
- [ ] Test video player with multiple videos
- [ ] Add error handling for missing videos
- [ ] Add basic styling to homepage
- [ ] Document deployment requirements

---

## File Structure (Final)

```
mass-snow-closings/
├── app/
│   ├── Console/Commands/
│   │   └── SyncClosingsCommand.php
│   ├── Http/Controllers/
│   │   └── ClosureController.php
│   ├── Models/
│   │   ├── Town.php
│   │   └── Closure.php
│   └── Services/
│       └── ClosingScraperService.php
├── context/
│   └── plan.md (this file)
├── database/
│   ├── migrations/
│   │   ├── xxxx_create_towns_table.php
│   │   └── xxxx_create_closures_table.php
│   └── seeders/
│       └── TownSeeder.php
├── public/
│   └── videos/
│       ├── holliston.mp4
│       ├── medway.mp4
│       └── ... (351 town videos)
├── resources/
│   ├── js/
│   │   └── video-player.js
│   └── views/
│       └── welcome.blade.php
└── routes/
    ├── api.php
    ├── console.php
    └── web.php
```

---

## Massachusetts Towns Reference

The seeder will include all 351 Massachusetts municipalities. Key considerations:
- Some towns have multi-word names (e.g., "West Bridgewater")
- Boston has neighborhoods but we'll treat it as one city
- Some names may appear differently on WCVB (need fuzzy matching)

---

## Verification Steps

1. **Scraper Test**: Run `php artisan closings:sync` and check database
2. **API Test**: Visit `/api/closures` and verify JSON response
3. **Video Test**: Place test videos in `public/videos/` and verify playback
4. **Full Integration**: With active closures, verify homepage plays correct videos
5. **Schedule Test**: Verify cron/scheduler runs every 5 minutes

---

## Notes

- Using SQLite for simplicity (can upgrade to MySQL/Postgres later)
- Videos served directly from `public/videos/` (can move to S3 later)
- Scraper uses Laravel's HTTP client (Guzzle wrapper)
- Frontend uses vanilla JavaScript (no framework needed)
