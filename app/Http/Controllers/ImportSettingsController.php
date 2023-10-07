<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;

class ImportSettingsController extends Controller
{
    public function edit()
    {
        return view('settings.import');
    }

    public function update(Request $request)
    {
        $request->validate([
            'import_file' => ['file'],
        ]);

        $importData = [];

        $row = 1;
        if (($handle = fopen($request->file('import_file')->getPathname(), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($row == 1) {
                    $row++;
                    continue;
                }

                if (!$data[3]) {
                    continue;
                }

                $importData[] = [
                    'date' => $data[0],
                    'exercise' => $data[1],
                    'category' => $data[2],
                    'weight' => $data[3],
                    'unit' => $data[4],
                    'reps' => $data[5],
                    'comment' => $data[9]
                ];

                $row++;
            }
            fclose($handle);
        }

        /** @var User $user */
        $user = auth()->user();

        $sessions = collect($importData)->map(fn (array $item) => $item['date'])->unique();

        // create sessions first
        $sessions->each(fn (string $date) => $user->sessions()->create(['date' => $date]));

        // then create records
        collect($importData)->each(function (array $item) use ($user) {
            $category = $user->categories()->firstOrCreate(
                [
                    'name' => $item['category']
                ]
            );

            $exercise = Exercise::firstOrCreate(
                [
                    'name' => $item['exercise'],
                    'category_id' => $category->id
                ],
            );

            $session = $user->sessions()->where('date', $item['date'])->first();

            $session->records()->create([
                'exercise_id' => $exercise->id,
                'weight' => $item['weight'],
                'reps' => $item['reps'],
                'comment' => $item['comment'],
            ]);
        });


        Notification::make()
            ->success()
            ->title('Successfully imported')
            ->send();

        return redirect()->route('home');
    }
}
