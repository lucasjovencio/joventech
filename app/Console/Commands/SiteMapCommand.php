<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Carbon\Carbon;
use Spatie\Sitemap\SitemapIndex;
use App\Services\Categoria\CategoriaService;
use App\Services\Publicacao\PublicacaoService;
use App\Services\Publicacao\ProjetoService;

class SiteMapCommand extends Command
{
    private $categoriaService;
    private $publicacaoService;
    private $projetoService;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Criação de sitemap';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CategoriaService $categoriaService,PublicacaoService $publicacaoService,ProjetoService $projetoService)
    {
        $this->categoriaService     =   $categoriaService;
        $this->publicacaoService    =  $publicacaoService;
        $this->projetoService       =  $projetoService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create(route('home.index'));

        $sitemap->add(Url::create(route('home.index'))
            ->setPriority(1)
        );
        $sitemap->add(Url::create(route('home.index')."#about")
            ->setPriority(1)
        );

        $sitemap->add(Url::create(route('home.index')."#service")
            ->setPriority(1)
        );

        $sitemap->add(Url::create(route('home.index')."#work")
            ->setPriority(1)
        );

        $sitemap->add(Url::create(route('home.index')."#blog")
            ->setPriority(1)
        );

        $sitemap->add(Url::create(route('home.index')."#contact")
            ->setPriority(1)
        );

        $sitemap->add(Url::create(route('home.blog'))
            ->setPriority(0.9)
        );

        $sitemap->add(Url::create(route('home.projeto'))
            ->setPriority(0.9)
        );

        foreach($this->categoriaService->getBlogCategoriasSubCategoria() as $categoria){
                $sitemap->add(Url::create(route('home.blog.categoria',['categoria'=>$categoria->slug ?? $categoria->nome ?? '']))
                    ->setLastModificationDate(Carbon::yesterday())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(0.5)
                );

                foreach($categoria->subcategoria as $sub){
                    $sitemap->add(Url::create(route('home.blog.categoria',['categoria'=>$sub->slug ?? $sub->nome ?? '']))
                        ->setLastModificationDate(Carbon::yesterday())
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                        ->setPriority(0.5)
                    );
                }
        }


        foreach($this->publicacaoService->getAllPosts() as $post){
            $sitemap->add(Url::create(route('home.blog.show',['id'=>$post->id,'slug'=>$post->slug ?? '']))
                    ->setLastModificationDate(Carbon::yesterday())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(0.8)
                );
        }

        foreach($this->projetoService->getProjetos() as $projeto){
            $sitemap->add(Url::create(route('home.projeto.show',['id'=>$projeto->id,'slug'=>$projeto->slug ?? '']))
                    ->setLastModificationDate(Carbon::yesterday())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(0.7)
                );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));
        return 0;
    }
}
