<?php

namespace Database\Seeders;

use App\Models\Town;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TownSeeder extends Seeder
{
    public function run(): void
    {
        $towns = $this->getMassachusettsTowns();

        foreach ($towns as $name) {
            Town::firstOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'has_video' => false,
                ]
            );
        }
    }

    private function getMassachusettsTowns(): array
    {
        return array_merge(
            $this->getTownsA(),
            $this->getTownsB(),
            $this->getTownsC(),
            $this->getTownsD(),
            $this->getTownsE(),
            $this->getTownsF(),
            $this->getTownsG(),
            $this->getTownsH(),
            $this->getTownsI(),
            $this->getTownsJ(),
            $this->getTownsK(),
            $this->getTownsL(),
            $this->getTownsM(),
            $this->getTownsN(),
            $this->getTownsO(),
            $this->getTownsP(),
            $this->getTownsQ(),
            $this->getTownsR(),
            $this->getTownsS(),
            $this->getTownsT(),
            $this->getTownsU(),
            $this->getTownsV(),
            $this->getTownsW(),
            $this->getTownsXYZ()
        );
    }

    private function getTownsA(): array
    {
        return [
            'Abington', 'Acton', 'Acushnet', 'Adams', 'Agawam', 'Alford',
            'Amesbury', 'Amherst', 'Andover', 'Aquinnah', 'Arlington',
            'Ashburnham', 'Ashby', 'Ashfield', 'Ashland', 'Athol',
            'Attleboro', 'Auburn', 'Avon', 'Ayer',
        ];
    }

    private function getTownsB(): array
    {
        return [
            'Barnstable', 'Barre', 'Becket', 'Bedford', 'Belchertown',
            'Bellingham', 'Belmont', 'Berkley', 'Berlin', 'Bernardston',
            'Beverly', 'Billerica', 'Blackstone', 'Blandford', 'Bolton',
            'Boston', 'Bourne', 'Boxborough', 'Boxford', 'Boylston',
            'Braintree', 'Brewster', 'Bridgewater', 'Brimfield', 'Brockton',
            'Brookfield', 'Brookline', 'Buckland', 'Burlington',
        ];
    }

    private function getTownsC(): array
    {
        return [
            'Cambridge', 'Canton', 'Carlisle', 'Carver', 'Charlemont',
            'Charlton', 'Chatham', 'Chelmsford', 'Chelsea', 'Cheshire',
            'Chester', 'Chesterfield', 'Chicopee', 'Chilmark', 'Clarksburg',
            'Clinton', 'Cohasset', 'Colrain', 'Concord', 'Conway',
            'Cummington',
        ];
    }

    private function getTownsD(): array
    {
        return [
            'Dalton', 'Danvers', 'Dartmouth', 'Dedham', 'Deerfield',
            'Dennis', 'Dighton', 'Douglas', 'Dover', 'Dracut', 'Dudley',
            'Dunstable', 'Duxbury',
        ];
    }

    private function getTownsE(): array
    {
        return [
            'East Bridgewater', 'East Brookfield', 'East Longmeadow',
            'Eastham', 'Easthampton', 'Easton', 'Edgartown', 'Egremont',
            'Erving', 'Essex', 'Everett',
        ];
    }

    private function getTownsF(): array
    {
        return [
            'Fairhaven', 'Fall River', 'Falmouth', 'Fitchburg', 'Florida',
            'Foxborough', 'Framingham', 'Franklin', 'Freetown',
        ];
    }

    private function getTownsG(): array
    {
        return [
            'Gardner', 'Georgetown', 'Gill', 'Gloucester', 'Goshen',
            'Gosnold', 'Grafton', 'Granby', 'Granville', 'Great Barrington',
            'Greenfield', 'Groton', 'Groveland',
        ];
    }

    private function getTownsH(): array
    {
        return [
            'Hadley', 'Halifax', 'Hamilton', 'Hampden', 'Hancock',
            'Hanover', 'Hanson', 'Hardwick', 'Harvard', 'Harwich',
            'Hatfield', 'Haverhill', 'Hawley', 'Heath', 'Hingham',
            'Hinsdale', 'Holbrook', 'Holden', 'Holland', 'Holliston',
            'Holyoke', 'Hopedale', 'Hopkinton', 'Hubbardston', 'Hudson',
            'Hull', 'Huntington',
        ];
    }

    private function getTownsI(): array
    {
        return ['Ipswich'];
    }

    private function getTownsJ(): array
    {
        return [];
    }

    private function getTownsK(): array
    {
        return ['Kingston'];
    }

    private function getTownsL(): array
    {
        return [
            'Lakeville', 'Lancaster', 'Lanesborough', 'Lawrence', 'Lee',
            'Leicester', 'Lenox', 'Leominster', 'Leverett', 'Lexington',
            'Leyden', 'Lincoln', 'Littleton', 'Longmeadow', 'Lowell',
            'Ludlow', 'Lunenburg', 'Lynn', 'Lynnfield',
        ];
    }

    private function getTownsM(): array
    {
        return [
            'Malden', 'Manchester-by-the-Sea', 'Mansfield', 'Marblehead',
            'Marion', 'Marlborough', 'Marshfield', 'Mashpee', 'Mattapoisett',
            'Maynard', 'Medfield', 'Medford', 'Medway', 'Melrose', 'Mendon',
            'Merrimac', 'Methuen', 'Middleborough', 'Middlefield', 'Middleton',
            'Milford', 'Millbury', 'Millis', 'Millville', 'Milton', 'Monroe',
            'Monson', 'Montague', 'Monterey', 'Montgomery', 'Mount Washington',
        ];
    }

    private function getTownsN(): array
    {
        return [
            'Nahant', 'Nantucket', 'Natick', 'Needham', 'New Ashford',
            'New Bedford', 'New Braintree', 'New Marlborough', 'New Salem',
            'Newbury', 'Newburyport', 'Newton', 'Norfolk', 'North Adams',
            'North Andover', 'North Attleborough', 'North Brookfield',
            'North Reading', 'Northampton', 'Northborough', 'Northbridge',
            'Northfield', 'Norton', 'Norwell', 'Norwood',
        ];
    }

    private function getTownsO(): array
    {
        return [
            'Oak Bluffs', 'Oakham', 'Orange', 'Orleans', 'Otis', 'Oxford',
        ];
    }

    private function getTownsP(): array
    {
        return [
            'Palmer', 'Paxton', 'Peabody', 'Pelham', 'Pembroke', 'Pepperell',
            'Peru', 'Petersham', 'Phillipston', 'Pittsfield', 'Plainfield',
            'Plainville', 'Plymouth', 'Plympton', 'Princeton', 'Provincetown',
        ];
    }

    private function getTownsQ(): array
    {
        return ['Quincy'];
    }

    private function getTownsR(): array
    {
        return [
            'Randolph', 'Raynham', 'Reading', 'Rehoboth', 'Revere',
            'Richmond', 'Rochester', 'Rockland', 'Rockport', 'Rowe',
            'Rowley', 'Royalston', 'Russell', 'Rutland',
        ];
    }

    private function getTownsS(): array
    {
        return [
            'Salem', 'Salisbury', 'Sandisfield', 'Sandwich', 'Saugus',
            'Savoy', 'Scituate', 'Seekonk', 'Sharon', 'Sheffield',
            'Shelburne', 'Sherborn', 'Shirley', 'Shrewsbury', 'Shutesbury',
            'Somerset', 'Somerville', 'South Hadley', 'Southampton',
            'Southborough', 'Southbridge', 'Southwick', 'Spencer',
            'Springfield', 'Sterling', 'Stockbridge', 'Stoneham', 'Stoughton',
            'Stow', 'Sturbridge', 'Sudbury', 'Sunderland', 'Sutton',
            'Swampscott', 'Swansea',
        ];
    }

    private function getTownsT(): array
    {
        return [
            'Taunton', 'Templeton', 'Tewksbury', 'Tisbury', 'Tolland',
            'Topsfield', 'Townsend', 'Truro', 'Tyngsborough', 'Tyringham',
        ];
    }

    private function getTownsU(): array
    {
        return ['Upton', 'Uxbridge'];
    }

    private function getTownsV(): array
    {
        return [];
    }

    private function getTownsW(): array
    {
        return [
            'Wakefield', 'Wales', 'Walpole', 'Waltham', 'Ware', 'Wareham',
            'Warren', 'Warwick', 'Washington', 'Watertown', 'Wayland',
            'Webster', 'Wellesley', 'Wellfleet', 'Wendell', 'Wenham',
            'West Boylston', 'West Bridgewater', 'West Brookfield',
            'West Newbury', 'West Springfield', 'West Stockbridge',
            'West Tisbury', 'Westborough', 'Westfield', 'Westford',
            'Westhampton', 'Westminster', 'Weston', 'Westport', 'Westwood',
            'Weymouth', 'Whately', 'Whitman', 'Wilbraham', 'Williamsburg',
            'Williamstown', 'Wilmington', 'Winchendon', 'Winchester',
            'Windsor', 'Winthrop', 'Woburn', 'Worcester', 'Worthington',
            'Wrentham',
        ];
    }

    private function getTownsXYZ(): array
    {
        return ['Yarmouth'];
    }
}
