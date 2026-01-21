<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function process(Request $request)
    {
        $message = strtolower(trim($request->message));
        $state = $request->state ?? 'main_menu';
        $selectedBeach = $request->selectedBeach ?? null;

        $response = '';
        $newState = $state;

        if ($state === 'main_menu') {
            switch ($message) {
                case 'explore beaches':
                    $newState = 'explore_beaches';
                    $response = "Which beach would you like to explore?<br>" . $this->beachList();
                    break;
                case 'get directions':
                    $newState = 'get_directions';
                    $response = "Select a beach to get directions:<br>" . $this->beachList();
                    break;
                case 'check weather':
                    $response = "Redirecting to 5-day weather forecast... <a href='#weather-section'>Click here</a>";
                    break;
                case 'beach activities':
                    $newState = 'activities';
                    $response = "Choose an activity:<ul><li>Zipline</li><li>Snorkeling</li><li>Camping</li><li>Boating</li><li>Back to menu</li></ul>";
                    break;
                case 'beach accommodations':
                    $newState = 'accommodations';
                    $response = "Select a beach to view accommodations:<br>" . $this->accommodationsList();
                    break;
                case 'contact owner':
                    $newState = 'contact_owner';
                    $response = "Which beach owner do you want to contact?<br>" . $this->beachList();
                    break;
                case 'general info and help':
                    $newState = 'info';
                    $response = "Options:<ul><li>Travel Advisory</li><li>Best Months to Visit</li><li>Back to menu</li></ul>";
                    break;
                case 'exit':
                    $response = "Thank you for using BeachGuide. Have a nice day! 🌊";
                    $newState = 'main_menu';
                    break;
                default:
                    $response = "Please choose an option from the main menu.";
                    break;
            }
        }

        // Add more `if` or `switch` blocks for each state: explore_beaches, get_directions, activities, accommodations, contact_owner, info, etc.

        return response()->json([
            'message' => $response,
            'state' => $newState,
            'selectedBeach' => $selectedBeach,
        ]);
    }

    private function beachList()
    {
        return "<ul><li>Twin Rock</li><li>Face of Jesus Beach</li><li>Magnesia del Norte</li><li>Kosta Alcantara</li><li>Marilima Beach</li><li>...etc</li></ul>";
    }

    private function accommodationsList()
    {
        return "<ul><li>Regina's Beachfront Resort</li><li>Batag Beach Resort</li><li>Jamaican Joyce</li><li>...etc</li></ul>";
    }
}
