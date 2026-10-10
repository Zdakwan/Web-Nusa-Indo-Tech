namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    private array $portofolios = [
        1 => [
            'id' => 1,
            'title' => 'Dinas Kebudayaan Pariwisata JATIM',
            'tag' => 'Development',
            'client' => 'Dinas Kebudayaan Provinsi Jatim',
            'year' => '2024',
            'link' => 'https://disbudpar.jatimprov.go.id',
            'image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=800&q=80',
            'desc' => 'Pengembangan website profil Dinas Kebudayaan Provinsi Jawa Timur...',
            'features' => ['Informasi profil dinas', 'Program dan kegiatan', 'Berita dan pengumuman', 'Layanan publik', 'Responsif untuk semua perangkat'],
        ],
    ];

    public function index()
    {
        return view('portofolio', ['projects' => $this->portofolios]);
    }

    public function show($id)
    {
        $project = $this->portofolios[$id] ?? $this->portofolios[1];
        return view('detail-portofolio', [
            'project' => $project,
            'otherProjects' => $this->portofolios,
        ]);
    }
}