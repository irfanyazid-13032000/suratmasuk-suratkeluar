<?php

function checkdulu($keaktifan)
{
  $ci = get_instance();
  // $ci->db->get('perjanjian', ['keaktifan' => 'N']);
  if ($keaktifan === 'nonaktif') {
    return "checked='checked'";
  }
}
