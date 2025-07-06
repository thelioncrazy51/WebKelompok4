namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function exportUsers()
    {
        $users = User::select('id', 'name', 'email', 'role')->get();
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        ];

        return new StreamedResponse(function() use ($users) {
            $handle = fopen('php://output', 'w');
            
            // Header CSV
            fputcsv($handle, ['ID', 'Nama', 'Email', 'Role']);
            
            // Data
            foreach ($users as $user) {
                fputcsv($handle, [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->role
                ]);
            }
            
            fclose($handle);
        }, 200, $headers);
    }
}