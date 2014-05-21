<?php
/**
 *
 * @author Jeffrey
 */
interface iData {
    public function getId();
    public function setId($id);
    public function insert();
    public function select($id_user);
    public function selectAll($id_user);
    public function update($id_user);
    public function delete($id_user);
    public function db_create($db, $obj);
    public function db_read($db, $sql, $parameters, $all);
    public function db_update($db, $obj);
    public function db_delete($db, $obj, $id_found);
}
