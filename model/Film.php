<?PHP
namespace classInstance;

class Film {
    public $film_id;
    public $title;
    public $release_date;
    public $tagline;
    public $director;
    public $age_rating;
    public $cover;
    public $description;
    public $trailer;
    public $duration;

    public function __construct($title, $release_date, $tagline, 
    $director, $age_rating, $cover, $description, $trailer, $duration)
    {
        $pdo = \PDOControllers::getConnection();
        try {
            $pdo->beginTransaction();
            $sql = "CREATE TABLE IF NOT EXISTS Film (
                film_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                title TEXT NOT NULL,
                release_date TEXT NOT NULL DEFAULT 'tbd',
                tagline TEXT NOT NULL DEFAULT '-',
                director TEXT NOT NULL DEFAULT 'tbd',
                age_rating TEXT NOT NULL DEFAULT 'tbd',
                cover TEXT NOT NULL,
                description TEXT NOT NULL DEFAULT 'tbd',
                trailer TEXT NOT NULL,
                description TEXT NOT NULL DEFAULT 'tbd',
                duration TEXT NOT NULL DEFAULT 'tbd'
                );";
                $pdo->exec($sql);
            $sql = "insert into Film (title, release_date, tagline, 
                director, age_rating, cover, 
                description, trailer, duration) values (
                \"$title\", 
                \"$release_date\", 
                \"$tagline\", 
                \"$director\", 
                \"$age_rating\", 
                \"$cover\", 
                \"$description\", 
                \"$trailer\", 
                \"$duration\"
                )";
            $query = $pdo->prepare($sql);
            $query->execute();
            $film_id = $pdo->lastInsertId();
            $pdo->commit();
        }
        catch (\Exception $e) {
            $pdo->rollBack();
            echo "Error: " . $e->getMessage();
        }

        $this->film_id = $film_id;
        $this->title = $title;
        $this->release_date = $release_date;
        $this->tagline = $tagline;
        $this->director = $director;
        $this->age_rating = $age_rating;
        $this->cover = $cover;
        $this->description = $description;
        $this->trailer = $trailer;
        $this->duration = $duration;
    }
}
