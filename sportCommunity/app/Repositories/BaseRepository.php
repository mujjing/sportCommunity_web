<?php
namespace App\Repositories;

class BaseRepository
{
    protected $model;

    ////////////////////////////////////////////////////
    // SELECT
    ////////////////////////////////////////////////////

    /**
     * 全件検索
     * Search all
     */
    public function get()
    {
        return $this->model->get();
    }

    public function paginate()
    {
        return $this->model->paginate();
    }

    /**
     * PK検索
     * search by primary key
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function existsId(int $id) : bool
    {
        // PKカラム名に依存しないようにするため、あえてexistsは使っていない
        // don't use exist() as it doesn't depend on Primary key
        return !is_null($this->model->find($id));
    }


    ////////////////////////////////////////////////////
    // INSERT
    ////////////////////////////////////////////////////


    /**
     * 1件登録
     * For saving one record only
     */
    public function insert(array $columns)
    {
        return $this->model->create($columns);
    }

    /**
     * 複数件登録
     * For saving multiple records together
     */
    public function bulkInsert(array $records)
    {
        return $this->model->insert($records);
    }

    ////////////////////////////////////////////////////
    // UPDATE
    ////////////////////////////////////////////////////

    public function findUpdate(int $id, array $columns)
    {
        return $this->model->find($id)->update($columns);
    }

    ////////////////////////////////////////////////////
    // DELETE
    ////////////////////////////////////////////////////

    public function findDelete(int $id)
    {
        return $this->model->destroy($id);
    }

    public function whereDelete(string $where_column, $value)
    {
        return $this->model->where($where_column, $value)->delete();
    }


    ////////////////////////////////////////////////////
    // other
    ////////////////////////////////////////////////////

    /**
     * Escape special characters for a LIKE query.
     *
     * @param string $value
     * @param string $char
     *
     * @return string
     */
    protected function escapeLike(string $value, string $char = '\\'): string
    {
        return str_replace(
            [$char, '%', '_'],
            [$char.$char, $char.'%', $char.'_'],
            $value
        );
    }
}
