<div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    </button>
                    <ul class="dropdown-menu">
                       
                        <li>
                            <a class="dropdown-item" href="./product_edit.php?id=<?php echo $row['id']; ?>&header=<?php
                                                                                                    if ($row['saccount'] == '60052') {
                                                                                                        echo 'furniture_thing';
                                                                                                    } elseif ($row['saccount'] == '60055') {
                                                                                                        echo 'it_thing';
                                                                                                    } elseif ($row['saccount'] == '60051') {
                                                                                                        echo 'nonit_thing';
                                                                                                    } else {
                                                                                                        echo 'use_thing';
                                                                                                    }
                                                                                                    ?>" style='color:green;'><i class="fa fa-pencil" aria-hidden="true"></i> កែសម្រួល</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./formUse.php?id=<?php echo $row['id']; ?>"style='color:blue;'><i class="fa fa-shopping-cart" aria-hidden="true"></i> ដកប្រើ/ដាក់ចូលឃ្លាំង</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./formBorrow.php?id=<?php echo $row['id']; ?>" style='color:#ffcf36;'><i class="fa fa-shopping-bag" aria-hidden="true"></i> កម្ចី</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="./product_delet.php?id=<?php echo $row['id']; ?>" style='text-decoration:none;color:red;' ><i class="fa fa-trash" aria-hidden="true"></i> លុប</a>
                        </li>
                        
                    </ul>
                </div>