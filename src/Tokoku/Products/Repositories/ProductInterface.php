<?php namespace Tokoku\Products\Repositories;

interface ProductInterface {

    public function find($id);
    public function findOrFail($id);
    public function findOneBy(array $params = array());
    public function findBy(array $params = array());
    public function all();
    public function create(array $input = array());
    public function update($id, array $input = array());
}