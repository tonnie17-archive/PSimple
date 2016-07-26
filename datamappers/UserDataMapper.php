<?php

class UserDataMapper extends AbstractDataMapper
{
    protected $_schema = 'user';

    public function save(AbstractModel $user)
    {
        $data = [
            'id'   => $user->getId(),
            'name' => $user->getName()
        ];
        $source = $this->getSource();
        $source->insert($data, $this->_schema);
    }

    public function update(AbstractModel $user)
    {
        echo 'update';
    }

    public function delete(AbstractModel $user)
    {
        echo 'delete';
    }
}
