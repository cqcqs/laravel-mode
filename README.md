# laravel-mode

基于 `laravel` 的项目开发规范，以面向对象思维开发

|  Laravel   | laravel-mode  |
|  ----  | ----  |
| 7.0  | V1.0 |
| 8.0  | V1.0 |

### Install

```$xslt
composer require cqcqs/laravel-mode
```

### Use

#### DTO

数据传输层，`Controller` 与 `Service` 之间通信的数据传输

```$xslt
# 生成 DTO
php artisan make:dto PostDTO
```

```$xslt
use App\DTO\PostDTO;

$postDTO = new PostDTO([
    'title' => $request->post('title')
]);

// or

$postDTO = new PostDTO();
$postDTO->setTitle($request->post('title'));
```

#### Service

业务逻辑层

```$xslt
# 生成 Service
php artisan make:service PostService
```

```$xslt
return ServiceHelper::make('Api\\PostService')->store($postDTO);
```

#### Repository

数据映射层

```$xslt
# 生成 Repository
php artisan make:repository PostRepository --model=App\Models\Post
```

```$xslt
use Cqcqs\Mode\Helpers\ResponseHelper;
use App\Repositories\PostRepository;

public function __construct(PostRepository $post)
{
    $this->post = $post;
}

public function store(PostDTO $postDTO)
{
    $list = $this->post->insert($postDTO->toArray());

    return new ResponseHelper();
}
```

### Links

**Blog：**[Stephen Blog](https://www.stephen520.cn/)
